<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Http\Response;
use Cake\Mailer\Email;

/**
 * Alumnos Controller
 *
 * @property \App\Model\Table\AlumnosTable $Alumnos
 *
 * @method \App\Model\Entity\Alumno[] paginate($object = null, array $settings = [])
 */
class AlumnosController extends AppController
{
	public function initialize()
	{
		parent::initialize();
	}

	public function isAuthorized($user)
	{
		if(isset($user['rol_id']) &&  $user['rol_id'] == OPERADOR)
		{
			if(in_array($this->request->action, ['oView','oIndex','edit']))
			{
				return true;
			}
		}
		
		return parent::isAuthorized($user);
		
		return true;
	}
	
	
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
    	
     	$this->paginate = [
     			'conditions' => ['alumnos.active' => true],
     			'finder' => 'ordered',
     	];
     
        $alumnos = $this->paginate($this->Alumnos);
        
        $this->set(compact('alumnos'));
    }

    public function search()
    {
    	$where1 = $where2 = $palabra = null;
    	if ($this->request->is('post'))
    	{
    		if(!empty($this->request->getData()) && $this->request->getData() !== null )
    		{
    			
    			$esActive = $this->request->getData()['activos'];
    			$where1= ['alumnos.active' => $esActive];
    			
    			if (!(empty($this->request->getData()['palabra_clave'])))
    			{
    				$palabra = $this->request->getData()['palabra_clave'];
    				$where2= ["(alumnos.nombre LIKE '%".addslashes($palabra)."%' OR alumnos.apellido LIKE '%".addslashes($palabra)."%' OR
							 alumnos.nro_documento LIKE '%".addslashes($palabra)."%' OR  CONCAT_WS(' ',alumnos.nombre ,alumnos.apellido) LIKE '".addslashes($palabra)."'
	     				OR  CONCAT_WS(' ',alumnos.apellido ,alumnos.nombre) LIKE '".addslashes($palabra)."')"
    				];
    			}
    			$this->request->session()->write('searchCond', [$where1,$where2]);
    			$this->request->session()->write('search_key', $palabra);
    		}
    	}
    	
    	if ($this->request->session()->check('searchCond')) {
    		$conditions = $this->request->session()->read('searchCond');
    	} else {
    		$conditions = null;
    	}
    	
    	$this->paginate = [
    			'conditions' => $conditions,
    			'limit' => 20,
    			'finder' => 'ordered',
    	];
    	
    	$alumnos = $this->paginate($this->Alumnos);
    	
    	$this->set(compact('alumnos'));
    	
    	$this->render('/Alumnos/index');
    }
    
    
    /**
     * View method
     *
     * @param string|null $id Alumno id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $clasesTable= TableRegistry::get('Clases');
        $clases = $clasesTable->find()
        ->select('Clases.id')
        ->matching('Alumnos', function ($q) use ($id) {
        	return $q->where(['ClasesAlumnos.active' => true, 'ClasesAlumnos.alumno_id' => $id]);
        })
        ->toArray();
        $ids = null;
        (count($clases) > 0) ? $ids = array() : $ids = -1 ;
        foreach ($clases as $c)
        {
        	$ids[] = $c['id'];
        }
        if (empty($ids))
        {
        	$where = ['Clases.id IN ' => -1];
        }
        else
        {
        	$where = ['Clases.id IN ' => $ids];
        }
        
        
        
        $alumno = $this->Alumnos->get($id, [
        		'contain' => ['Clases' => [ 'conditions' => $where]  ]  ]);
        
        	$segTable= TableRegistry::get('SeguimientosPrograma');
        	$seguimientos = $segTable->find()
        	->limit(10)
        	->orderDesc('fecha')
        	->where(['fecha <='=>  date('Y-m-d h:m',time())])
        	->matching('ClasesAlumnos', function ($q) use ($ids,$id) {
        		return $q->where(['ClasesAlumnos.clase_id IN' => $ids,'ClasesAlumnos.alumno_id ' => $id]);
        	})
        	->toArray();
        
        $this->set(['alumno','clases','seguimientos'],[$alumno,$clases,$seguimientos]);
        $this->set('_serialize', ['alumno']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $alumno = $this->Alumnos->newEntity();
        if ($this->request->is('post')) 
        {
		$tieneClases = false;
        	if (!empty($this->request->getData("clases")) &&  $this->request->getData("clases")[0] != '')
        	{
        		$i=0;
        		foreach ($this->request->getData("clases") as $c)
        		{
        			$ids['_ids'][$i]=  $c;
        			$i++;
        		}
        		$this->request  = $this->request->withData('clases',$ids);
				$tieneClases = true;
        	}
        	
            $alumno = $this->Alumnos->patchEntity($alumno, $this->request->getData());
            if ($this->request->getData()['foto']['error'] != 4)
            {
           		if ($this->request->getData()['foto']['error'] == 0)
	            {
	            	$ref = $this->guardarImg($this->request->getData()['foto'], $alumno->id);
	            	$alumno->referencia_foto = $ref;
	            }
	            else
	            {
	            	$this->Flash->error(__('Problema al guardar la foto. Alumno no guardado'));
	            	return $this->redirect($this->referer());
	            }
             }
             
             
             /*
             Calculo la edad sí tiene cargada la fecha de nac
             */
             if (!empty($alumno->fecha_nacimiento))
             {
	             $today = date("Y-m-d");
	             $difference = date_diff(date_create($alumno->fecha_nacimiento->format('Y-m-d')), date_create($today));
	             $alumno->set('edad',$difference->format('%y'));
             }
            	if ($this->Alumnos->save($alumno)) 
            	{
            		if ($tieneClases)
            		{
            				if (!$this->insertarSeguimientoPrograma($alumno->id, $this->request->getData("clases")['_ids']))
            				{
            					$this->Alumnos->delete($alumno);
            					$this->Flash->error(__('Problema al crear los seguimientos. Alumno no guardado'));
            					return $this->redirect($this->referer());
            				}
            		}
            		$this->Flash->success(__('Alumno guardado.'));
            		return $this->redirect(['action' => 'index']);
            	}
	            
        }
        $operadores = TableRegistry::get('Operadores')->find('list')->where(['active' => true]);
        $this->set(compact('alumno', 'clases','operadores'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Alumno id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $alumno = $this->Alumnos->get($id, [
            'contain' => ['Clases']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {

        	$ids = null;
        	if (!empty($this->request->getData("clasesnuevas")[0]) )
        	{
        		$i=0;
        		foreach ($this->request->getData("clasesnuevas") as $c)
        		{
        			$ids['_ids'][$i]=  $c;
        			$i++;
        		}
        		if(!empty($this->request->getData("clases")))
        		{
        				foreach ($this->request->getData("clases") as $c)
        				{
        					$ids['_ids'][$i]=  $c;
        					$i++;
        				}
        		}
        	}
        	elseif (!empty($this->request->getData("clases")) && $this->request->getData("clases"))
        	{
        		$i=0;
        		foreach ($this->request->getData("clases") as $c)
        		{
        			$ids['_ids'][$i]=  $c;
        			$i++;
        		}
        	}
        	else 
        	{
        			$ids['_ids'] = null;
        	}
        	$this->request  = $this->request->withData('clases',$ids);
        	$alumno = $this->Alumnos->patchEntity($alumno, $this->request->getData());
        	if(!$alumno->active)
        	{
        		$alumno->desactivarme();
        	}
        	else
        	{
        		$alumno->fecha_baja = NULL;
        	}
        	if ($this->request->getData()['foto']['error'] != 4)
        	{
        		if ($this->request->getData()['foto']['error'] == 0)
        		{
        			
        			$ref = $this->guardarImg($this->request->getData()['foto'], $alumno->id);
        			$alumno->referencia_foto = $ref;
        		}
        		else
        		{
        			$this->Flash->error(__('Problema al guardar la foto. Alumno no guardado'));
        			return $this->redirect($this->referer());
        		}
        	}
        	/*
        	 Calculo la edad sí tiene cargada la fecha de nac
        	 */
        	if (!empty($alumno->fecha_nacimiento))
        	{
        		$today = date("Y-m-d");
        		$difference = date_diff(date_create($alumno->fecha_nacimiento->format('Y-m-d')), date_create($today));
        		$alumno->set('edad',$difference->format('%y'));
        	}
        	/* */
            if ($this->Alumnos->save($alumno)) 
            {
            	
            	if (!empty($this->request->getData("clases")['_ids']))
            	{
            	    if (!$this->insertarSeguimientoPrograma($alumno->id, $this->request->getData("clases")['_ids']))
	            			{
	            				$this->Flash->error(__('Problema al crear los seguimientos'));
	            			}
            	}
                $this->Flash->success(__('Alumno actualizado.'));
                if ($this->Auth->user('operador_id') > 0)
                {
                    return $this->redirect(['action' => 'o_index']);
                }
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('El alumno no pudo ser guardado, reintente'));
        }
       $clases = $this->Alumnos->Clases->find('list', ['limit' => 200]);
       $operadores = TableRegistry::get('Operadores')->find('list')->where(['active' => true]);
        $this->set(compact('alumno','clases','operadores'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Alumno id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $alumno = $this->Alumnos->get($id);
        if ($this->Alumnos->delete($alumno)) {
            $this->Flash->success(__('Alumno borrado.'));
        } else {
            $this->Flash->error(__('Error intentando borrar al alumno, reintente!.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    /*
     * Desactiva al alumno
     * Desactiva la clase_alumno
     * 
     */
    public function baja($id = null)
    {
    	//desac
    	$this->request->allowMethod(['post', 'delete']);
    	$alumno = $this->Alumnos->get($id);
    	
    	if ($alumno->desactivarme())
    	{
    		if($this->Alumnos->save($alumno))
    		{
    			$this->Flash->success(__('Alumno dado de baja. Clases y seguimientos borrados'));
    		}
    		
    	}
    	else 
    	{
    		$this->Flash->error(__('Error al dar de baja, reintente!'));
    	}
    	
    	
    	return $this->redirect(['action' => 'index']);
    }
    
    public function transferirClase($id = null, $claseId = null)
    {
        $alumno = null;
        $clase = null;
        /* Tengo que agregarlo a la clase nueva,crear los segumientos ,crear un seguimiento para la fecha de hoy (en caso que no exista) ,
         * copiar la observación de todos los seguimientos anteriores, junto con la fecha y ponerlo en el seguimiento creado.
         * Agregar en la observación del alumno que hoy, fue cambiado de clase por tal personal y trasferido de tal a tal lado.
         * Tengo que quitarlo de la clase anterior
         */
        if ($this->request->is('post'))
        {
            if (! ($this->request->getData('clases')[0]> 0))
            {
                $this->Flash->error('Seleccione la clase nueva');
                return $this->redirect($this->referer());
            }
            $idClaseAnterior = $this->request->getData('clase_id');
            
            $idClaseNueva = $this->request->getData('clases')[0];
            
            /* Me traigo los ids de clases nuevas , viejas y del alumno */
            $claseAnterior = $this->request->getData('clase_id');
            $claseNueva = $this->request->getData('clases')[0];
            $alumno_id = $this->request->getData('alumno_id');
            $alumno = $this->Alumnos->get($alumno_id);
            
            /* Me traigo la clase anterior*/
            $claseAnterior = $this->Alumnos->Clases->get($idClaseAnterior);
            
            /* La clase nueva */
            $claseNueva = $this->Alumnos->Clases->get($idClaseNueva);
            
            /* objeto clase anterior */
            $claseAnteriorList = $this->Alumnos->Clases->find()->where(['id' => $claseAnterior->id])->toList();
            
            /* CA anterior */
            $clase_alumno_id_anterior = TableRegistry::get('ClasesAlumnos')->find()->select(['id'])
            ->where(['ClasesAlumnos.clase_id' => $claseAnterior->id, 'ClasesAlumnos.alumno_id' => $alumno_id])
            ->all()->toList()[0]->id;
            
            /* tabla Seguimientos */
            $Seguimientos = TableRegistry::get('SeguimientosPrograma');
            
            /* Borro los seguimientos posteriores a hoy de la CA anterior */
            $ids = null;
            $ids = $Seguimientos->find()
            ->select(['SeguimientosPrograma.id'])
            ->where(["DATE(SeguimientosPrograma.fecha) > " => date('Y-m-d'),
                'SeguimientosPrograma.clase_alumno_id' => $clase_alumno_id_anterior]);
            
            $checkBorrado = $Seguimientos->deleteAll(['SeguimientosPrograma.id IN' => $ids->extract('id')->toList()]);
            
            if (!$checkBorrado) {
                $this->Flash->error("Seguimientos posteriores no borrados");
            }
            
            /* Creo la CA nueva*/
            $claseNuevaList = $this->Alumnos->Clases->find()->where(['id' => $claseNueva->id])->toList();
            $checkClaseNueva = $this->Alumnos->Clases->link($alumno, $claseNuevaList);
            
            /* obtengo CA Nueva */
            $clase_alumno_id_nueva = TableRegistry::get('ClasesAlumnos')->find()->select(['id'])
            ->where(['ClasesAlumnos.clase_id' => $claseNueva->id, 'ClasesAlumnos.alumno_id' => $alumno_id])
            ->all()->toList()[0]->id;
            
            /* Actualizo los seguimientos anterior a hoy de la CA anterior */
            $ids = null;
            $ids = $Seguimientos->find()
            ->select(['id'])
            ->where(['DATE(SeguimientosPrograma.fecha) <= ' => date('Y-m-d'),
                'SeguimientosPrograma.clase_alumno_id' => $clase_alumno_id_anterior]);
            
            $checkActualizacion = $Seguimientos
            ->updateAll(['clase_alumno_id' => $clase_alumno_id_nueva, 'fue_transferida' => true], ['SeguimientosPrograma.id IN' => $ids->extract('id')->toList()]);
            
            if (!$checkActualizacion)
            {
                $this->Flash->error("Seguimientos anteriores no actualizados");
            }
            
            $checkNuevosSeguimientos= $this->insertarSeguimientoPrograma($alumno_id, [0 => $claseNueva->id], true);
            
            $checkUnlinkClaseVieja = $this->Alumnos->Clases->unlink($alumno, $claseAnteriorList);
            
            if ($checkActualizacion && $checkBorrado && $checkClaseNueva && $checkNuevosSeguimientos && $checkUnlinkClaseVieja )
            {
                $this->Flash->success('Alumno/a tranferido con éxito');
                $this->redirect(['action' => 'view', $alumno_id]);
                
            }
            else
            {
                $this->Flash->error('Error al tranferir al alumno/a');
                $this->redirect(['action' => 'view', $alumno_id]);
                
            }
            
            
        }
        else
        {
            if (!empty($id) || !empty($claseId))
            {
                $alumno = $this->Alumnos->get($id);
                $clase = $this->Alumnos->Clases->get($claseId);
            }
        }
        $operadores = TableRegistry::get('Operadores')->find('list')->where(['active' => true]);
        $this->set(compact('alumno','operadores','clase'));
        
        
    }
    public function oIndex()
    {
    	
    	$alumnos = $this->Alumnos->find('all')
    	->find('ordered')
    	->matching('Clases', function ($q)  {
    		return $q->where(['ClasesAlumnos.active' => true, 'Clases.operador_id' =>  $this->Auth->user('operador_id')]);
    	})
    	->distinct(['Alumnos.id'])
    	
    	->toArray()
    	;
    	
    	
    	$this->set(compact('alumnos'));
    }
    
    
    public function oView($id = null)
    {
    	$idOperador = $this->Auth->user('operador_id');
    	$clasesTable= TableRegistry::get('Clases');
    	$clases = $clasesTable->find()
    	->select('Clases.id')
    	->matching('Alumnos', function ($q) use ($id) {
    		return $q->where(['ClasesAlumnos.active' => true, 'ClasesAlumnos.alumno_id' => $id]);
    	})
    	->where(['Clases.operador_id' => $idOperador])
    	->toArray();
    	$ids = null;
    	(count($clases) > 0) ? $ids = array() : $ids = -1 ;
    	foreach ($clases as $c)
    	{
    		$ids[] = $c['id'];
    	}
    	if (empty($ids))
    	{
    		$where = ['Clases.id IN ' => -1];
    	}
    	else
    	{
    		$where = ['Clases.id IN ' => $ids];
    	}
    	
    	$segTable= TableRegistry::get('SeguimientosPrograma');
    	$seguimientos = $segTable->find()
    	->orderDesc('fecha')
    	->where(['fecha <='=>  date('Y-m-d h:m',time())])
    	->matching('ClasesAlumnos', function ($q) use ($ids,$id) {
    		return $q->where(['ClasesAlumnos.clase_id IN' => $ids, 'ClasesAlumnos.alumno_id' => $id]);
    	})
    	->toArray();
    	
    	
    	
    	$alumno = $this->Alumnos->get($id, [
    			'contain' => ['Clases' => [ 'conditions' => $where]  ]  ]);
    	
    	$this->set(['alumno','clases','seguimientos'],[$alumno,$clases,$seguimientos]);
    }
    
    
    public function listadoCumple()
    {
    	if ($this->request->is(['post']))
    	{
    		
    		$activos = $this->request->getData('activos');
    		$mes = $this->request->getData('mob')['month'];
    		if ($mes)
    		{
    			return $this->redirect(['action' => 'listado_cumple_alumnos', $mes,$activos]);
    		}
    	}
    	$alumno = $this->Alumnos->newEntity();
    	$this->set('alumno',$alumno);
    	
    }
    
    public function listadoCumplePdf($mes,$activos)
    {
   
    	$where = null;
    	if($activos)
    	{
    		$where=['active' => $activos];
    	}
    	$nombreMes = __(date('F',strtotime("01-$mes-2000")));
    		$alumnos = $this->Alumnos->find('all')
    		->where([
    				$where,
    		'MONTH(fecha_nacimiento)' => "$mes"
    		])
    		->select(['nombre','apellido','fecha_nacimiento'])
    		->orderAsc('DAY(fecha_nacimiento)')
    		->toArray();
    		
    		if(empty($alumnos))
    		{
    			$this->Flash->error("No hay alumnos que cumplan en el mes de ".$nombreMes);
    			return $this->redirect(['action' => 'listado_cumple']);
    		}
    		
    		$month = 'Listado del mes ' . __(date('F',strtotime("01-$mes-2000")));
    		$hoja = 'A4';
    		$ori = 'portrait';
    		$this->prepararPDFListado($month,$hoja,$ori );
    		$this->set(['alumnos','month'],[$alumnos,$nombreMes]);
    		
    }
    
    public function listadoCumpleAlumnos($mes,$activos)
    {
     	$where = null;
    	if($activos)
     	{
     		$where=['active' => $activos];
    	}
     	$nombreMes = __(date('F',strtotime("01-$mes-2000")));
     	$alumnos = $this->Alumnos->find('all')
     	->where([
     			$where,
     			'MONTH(fecha_nacimiento)' => "$mes"
    	])
     	->select(['nombre','apellido','fecha_nacimiento','email','email_madre','email_padre'])
     	->orderAsc('DAY(fecha_nacimiento)')
     	;
    	if(empty($alumnos))
    	     	{
     		$this->Flash->error("No hay alumnos que cumplan en el mes de ".$nombreMes);
     		return $this->redirect(['action' => 'listado_cumple']);
    	}
    	
      	$month =  __(date('F',strtotime("01-$mes-2000")));
      	
      	$this->set(['alumnos','month'],[$alumnos,$month]);


    }
    
    public function fichaInterna($id)
    {
    	$alumno = $this->Alumnos->get($id);
		$this->prepararPDF($alumno,"interna","A4","landscape");
    	$this->set(compact('alumno'));
    	
    }
    
    public function fichaExterna($id)
    {
    	$alumno = $this->Alumnos->get($id, [
    			'contain' => ['Clases']
    	]);
    	$this->prepararPDF($alumno,"externa","A4","landscape");
    	
    	$this->set(compact('alumno'));
    	
    }
    
    private function guardarImg($data,$alu)
    {
    	$uploadFile = WWW_ROOT  . 'img' . DS. 'alumnos' . DS;
    	// debug($data); exit;
    	if(!empty($data) && !empty($data['tmp_name']) && !$data['error'])
    	{
    		$referencia = $uploadFile .h($alu. "-"  .$data['name']);
    		if(!move_uploaded_file($data['tmp_name'],$referencia))
    		{
    			$this->Flash->error("Tenemos un problema para cargar la foto");
    			return false;
    		}
    		return $alu. "-"  .$data['name'];
    	}
    	$this->Flash->error("Tenemos un problema para cargar la foto");
    	return false;
    }
   
    private function prepararPDFListado($nomArchivo, $tipoHoja,  $orientacion)
    {
    	$this->viewBuilder()->setOptions([
    			'pdfConfig' => [
    					'margin-bottom' => 0,
    					'margin-right' => 0,
    					'margin-left' => 0,
    					'margin-top' => 0,
    					'pageSize' => $tipoHoja,
    					'orientation' => $orientacion,
    					'filename' => $nomArchivo.'.pdf'
    			]
    	]);
    }
    
    private function prepararPDF($alumno, $tipo, $tipoHoja,  $orientacion)
    {
    	$this->viewBuilder()->setOptions([
    			'pdfConfig' => [
    					'margin-bottom' => 0,
    					'margin-right' => 0,
    					'margin-left' => 0,
    					'margin-top' => 0,
    					'pageSize' => $tipoHoja,
    					'orientation' => $orientacion,
    					'filename' => "Ficha $tipo de :" . $alumno->get('presentacion').'-'.$alumno->nro_documento. '.pdf'
    			]
    	]);
    }


	
	private function insertarSeguimientoPrograma($idAlumno, $idsClases, $esTranferencia = false)
	{
		$alumno = $this->Alumnos->get($idAlumno);
		
		//creo un array con los dias con clave y valor para despues poder compararlo con la funcion DATE
		$days = ['Monday' => 1, 'Tuesday' => 2, 'Wednesday' => 3, 'Thursday' => 4, 'Friday' => 5];
		
		//me traigo la tabla de seguimientosPrograma
		$Seguimientos = TableRegistry::get('SeguimientosPrograma');
		
		//Me traigo la tabla de ClasesAlumnos
		$ClasesAlumno = TableRegistry::get('ClasesAlumnos');
		
		//Recorro los ids de clases que voy a necesitar para crear los seguimientos
 		foreach ($idsClases as  $pos => $idClase)
 		{
			
			//Busco en la base el ID de ClasesAlumnos con id Id de Clase y el ID de Alumno
			$idClaseAlumno = $ClasesAlumno->find('all')
			->where(['ClasesAlumnos.alumno_id' => $idAlumno, 'ClasesAlumnos.clase_id' => $idClase]);
			//valido que venga ID
			if(empty($idClaseAlumno->first()->id))
			{
				$this->Flash->error("El alumno no está inscripto en la clase ID: ".$idClase);
				return false;
			}
			//Me traigo el obj de claseAlumno con todas las propiedasdes y asociaciones
			$claseAlumno = $ClasesAlumno->get($idClaseAlumno->first()->id,['contain' => ['Clases' => ['Horarios' => 'Ciclolectivo'] ] ]);
			
			if(!$claseAlumno->existeSeguimientoPrograma() || $esTranferencia)
			{
				//Creo las fechas de incio y fin para  recorrerlas
				$fechaInicio = strtotime(date('Y-m-d'));
				$fechaFin = strtotime($claseAlumno->clase->horario->ciclolectivo->fecha_fin->format('Y-m-d'));
				
				//recorro por dia hasta la fecha fin
				for($i=$fechaInicio; $i<=$fechaFin; $i+=86400)
				{
					//me traigo el nombre del dia
					$dia = date('N', $i);
					
					//si el dia es el mismo que que el dia de la clase, tengo que crear un seguimiento para ese dia
					if($dia == $days[$claseAlumno->clase->horario->nombre_dia])
					{
						//     				echo $clase->horario->nombre_dia. " ". date ("Y-m-d", $i)."<br>";
						$seguimiento = $Seguimientos->newEntity(
								[
										'clase_alumno_id' => $claseAlumno->id,
										'observacion' => "SIN DATOS",
										'presente' => false,
										'fecha' => new  \DateTime(date('Y-m-d H:i:s', $i)),
										'created' => new \DateTime('now'),
										'created' => new \DateTime('now')
										
								]);
						//$seguimiento->fecha = date ("Y-m-d H:i:s", $i);
						//guardo y valido
						if (!$Seguimientos->save($seguimiento))
						{
							$this->Flash->error("Seguimiento de fecha " .$seguimiento->fecha . " no creado");
							return false;
						}
						
					}
				}
			}
 		} //fin foreach de IDSclases
		return true;
	}
	
	
	
	/*
	 * prueba de ajax
	 */
	public function getDisciplinas() {
		$this->autoRender = false; // We don't render a view in this example
		$operador_id = $this->request->getQuery('operador_id');
		$discs = TableRegistry::get('Disciplinas')->find('all')
	//	->select(['Disciplinas.id' => 'id','Disciplinas.descripcion' => 'desc' ])
		->distinct('Disciplinas.descripcion')
		->matching('Clases.Horarios.Ciclolectivo')
		->where(['Clases.operador_id' => $operador_id, 'YEAR(Ciclolectivo.fecha_inicio)' => date('Y')])
		->order('Disciplinas.descripcion')
		;
		$i = 0;
		foreach ($discs as $d){
			$i++;
			
			if($i != $discs->count())
			{
				echo $d->id.'-'.$d->descripcion.".";
			}
			else {
				echo $d->id.'-'.$d->descripcion;
			}
		}
		//print $array;
		exit;
	}
	public function getDiaHorario() 
	{
		$this->autoRender = false; // We don't render a view in this example
		$disciplina_id = $this->request->getQuery('disciplina_id');
		$operador_id= $this->request->getQuery('operador_id');
		$clases = TableRegistry::get('Clases')->find('all')
		->contain(['Disciplinas','Horarios'=> ['Ciclolectivo']])
		->where(['Clases.operador_id' => $operador_id, 'Clases.disciplina_id' => $disciplina_id])
		->find('currentYear')
		->order('Horarios.num_dia','Horarios.hora')
		;
		$i = 0;
		foreach ($clases as $c){
			$i++;
			$dia = __($c->horario->nombre_dia);
			if($i != $clases->count())
			{
				
				echo  $c->id."-".$dia.' '.$c->horario->hora->format('H:i').".";
			}
			else {
				echo  $c->id."-".$dia.' '.$c->horario->hora->format('H:i');
			}

		}
		
		//print $array;
		exit;
	}
	
	
	
}
