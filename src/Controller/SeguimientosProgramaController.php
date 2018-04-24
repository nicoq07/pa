<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Controller\Component;
use App\Controller\Component\TipoPresentesComponent;

/**
 * SeguimientosPrograma Controller
 *
 * @property \App\Model\Table\SeguimientosProgramaTable $SeguimientosPrograma
 *
 * @method \App\Model\Entity\SeguimientosPrograma[] paginate($object = null, array $settings = [])
 */
class SeguimientosProgramaController extends AppController
{
	public function isAuthorized($user)
	{
		if(isset($user['rol_id']) &&  $user['rol_id'] == OPERADOR)
		{
			if(in_array($this->request->action, ['oIndex','edit','view','oSearch','addProfesor','oReset','oPorDia','oCargaMultiple','getDisciplinas', 'getDiaHorario']))
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
            'contain' => ['ClasesAlumnos' => ['Alumnos','Clases' => ['Disciplinas','Horarios','Profesores','Operadores'] ]],
            'conditions' => ['fecha' => date('Y-m-d') ],
            'order' => ['Horarios.hora'],
            'limit' => 20
        ];
        $mensaje[0]= 'Seguimientos del día de hoy.';
        $seguimientosPrograma= $this->paginate($this->SeguimientosPrograma);
        $this->set(compact('seguimientosPrograma','mensaje'));
    }
    public function search()
    {
        $wherePalabraClave= $whereClase = $whereFecha = $whereOperador = $whereYaCargados= $where6 = $palabra = null;
        //$whereFecha = ["YEAR(fecha) = YEAR('".date('Y-m-d')."')"];
        $mensaje  = ['Seguimientos del día del hoy'];
        if ($this->request->is('post'))
        {
            $mensaje = null;
            
            if(!empty($this->request->getData()) && $this->request->getData() !== null )
            {
                if ($this->request->getData()['operadores'] > 0)
                {
                    $ope_id = $this->request->getData()['operadores'];
                    $OperadoresTable = TableRegistry::get("Operadores");
                    $operador = $OperadoresTable->get($ope_id);
                    $whereOperador= "Operadores.id = $ope_id";
                    $mensaje ['Se buscó por']["Operador :"] = [$operador->presentacion];
                }
                
                if ($this->request->getData()['modificados'])
                {
                    $whereYaCargados= 'SeguimientosPrograma.created <> SeguimientosPrograma.modified';
                    $mensaje ['Se buscó por']["Seguimientos :"] = ["Ya cargados"];
                }
                
                if (!(empty($this->request->getData()['clases'])))
                {
                    $clase = $this->request->getData()['clases'];
                    $whereClase= ["clases.id = $clase"];
                    $clasesTable = TableRegistry::get("Clases");
                    $clase = $clasesTable->get($clase);
                    $mensaje ['Se buscó por']["Clase de :"]=   [$clase->presentacionCorta];
                }
                
                $mes= $this->request->getData()['mob']['month'];
                $year= $this->request->getData()['year']['year'];
                if ($year && $mes)
                {
                    $fecha =date('Y-m-d',strtotime("$year-$mes-01"));
                    $whereFecha = ["EXTRACT(YEAR_MONTH FROM fecha) = EXTRACT(YEAR_MONTH FROM '$fecha')"];
                    $mensaje ['Se buscó por']["Mes y año :"]= [date('m-Y',strtotime($fecha))];
                }
                elseif ($year)
                {
                    $fecha =date('Y-m-d',strtotime("$year-01-01"));
                    $whereFecha = ["YEAR(fecha) = YEAR('$fecha')"];
                    $mensaje['Se buscó por']["Año :"]=  [date('Y',strtotime($fecha))];
                }
                elseif ($mes)
                {
                    $fecha =date('Y-m-d',strtotime("2000-$mes-01"));
                    $whereFecha = ["MONTH(fecha) = MONTH('$fecha')"];
                    $mensaje['Se buscó por']["Mes:"]=  [date('m',strtotime($fecha))];
                }
                else {
                    $fecha =date('Y-m-d');
                    $whereFecha = ["YEAR(fecha) = YEAR('$fecha')"];
                    $mensaje['Se buscó por']["Año :"]=  [date('Y',strtotime($fecha))];
                }
                if (!(empty($this->request->getData()['palabra_clave'])))
                {
                    $palabra = $this->request->getData()['palabra_clave'];
                    $wherePalabraClave=  ["(alumnos.nombre LIKE '%".addslashes($palabra)."%' OR alumnos.apellido LIKE '%".addslashes($palabra)."%' OR
							 alumnos.nro_documento LIKE '%".addslashes($palabra)."%' OR  CONCAT_WS(' ',alumnos.nombre ,alumnos.apellido) LIKE '".addslashes($palabra)."'
	     				OR  CONCAT_WS(' ',alumnos.apellido ,alumnos.nombre) LIKE '".addslashes($palabra)."'
							OR profesores.nombre LIKE '%".addslashes($palabra)."%'  OR profesores.apellido LIKE '%".addslashes($palabra)."%') 
							OR operadores.nombre LIKE '%".addslashes($palabra)."%'  OR operadores.apellido LIKE '%".addslashes($palabra)."%') "
                    ];
                    $mensaje['Se buscó por']["Alumno :"] = [$palabra] ;
                }
                $this->request->session()->write('searchCond', [$wherePalabraClave,$whereClase,$whereFecha,$whereOperador,$whereYaCargados]);
                $this->request->session()->write('search_key', $palabra);
            }
        }
        if ($this->request->session()->check('searchCond')) {
            $conditions = $this->request->session()->read('searchCond');
        } else {
            $conditions = null;
            if (!empty($fecha))
            {
                $where6 = ['YEAR(ciclolectivo.fecha_inicio)' => $year];
            }
            else {
                $where6 = ['YEAR(ciclolectivo.fecha_inicio)' => date('Y')];
            }
        }
        $this->paginate = [
            'contain' => ['ClasesAlumnos' => ['Alumnos','Clases' => ['Disciplinas','Horarios','Profesores','Operadores'] ]],
            'conditions' => $conditions,
            'limit' => 20
        ];
        
        
        
        $seguimientosPrograma= $this->paginate($this->SeguimientosPrograma);
        $this->set(compact('seguimientosPrograma','mensaje'));
        
        $this->render('/SeguimientosPrograma/index');
    }
    /**
     * View method
     *
     * @param string|null $id Seguimientos Programa id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $seguimientosPrograma = $this->SeguimientosPrograma->get($id, [
        		'contain' => ['ClasesAlumnos' => ['Clases','Alumnos']]
        ]);

        $this->set('seguimientosPrograma', $seguimientosPrograma);
        $this->set('_serialize', ['seguimientosPrograma']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $seguimientosPrograma = $this->SeguimientosPrograma->newEntity();
        if ($this->request->is('post')) {
            $seguimientosPrograma = $this->SeguimientosPrograma->patchEntity($seguimientosPrograma, $this->request->getData());
            if ($this->SeguimientosPrograma->save($seguimientosPrograma)) {
                $this->Flash->success(__('The seguimientos programa has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The seguimientos programa could not be saved. Please, try again.'));
        }
        $clasesAlumnos = $this->SeguimientosPrograma->ClasesAlumnos->find('list', ['limit' => 200]);
        $this->set(compact('seguimientosPrograma', 'clasesAlumnos'));
        $this->set('_serialize', ['seguimientosPrograma']);
    }


    /**
     * Delete method
     *
     * @param string|null $id Seguimientos Programa id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $seguimientosPrograma = $this->SeguimientosPrograma->get($id);
        if ($this->SeguimientosPrograma->delete($seguimientosPrograma)) {
            $this->Flash->success(__('The seguimientos programa has been deleted.'));
        } else {
            $this->Flash->error(__('The seguimientos programa could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    public function addProfesor($claseAlumno = null)
    {
		$this->autoRender = false;
    	$seg = $this->SeguimientosPrograma->find()
    	->where(['clase_alumno_id' => $claseAlumno,'fecha' => date('Y-m-d',strtotime('now'))]);
    	if($seg->count() == 0)
    	{
    		$this->Flash->error(__('El día de hoy no se puede cargar este seguimiento. Dirigase a Ver Seguimientos.'));
    		return $this->redirect($this->referer());
    	}
    	$seguimientosPrograma = $this->SeguimientosPrograma->get($seg->first()->id, [
    			'contain' => ['ClasesAlumnos']
    	]);
    	if ($this->request->is(['patch', 'post', 'put'])) {
    	    $seguimientosPrograma = $this->SeguimientosPrograma->patchEntity($seguimientosPrograma, $this->request->getData());
    	    if ($this->SeguimientosPrograma->save($seguimientosPrograma)) {
    			$this->Flash->success(__('Seguimiento guardado'));
    			$url = ['controller' => 'Clases' ,'action' => 'oView', $seguimientosPrograma->clases_alumno->clase_id];
    			return $this->redirect($url);
    		}
    		$this->Flash->error(__('El seguimiento no ha podido guardarse, reintente!.'));
    	}
    	$this->loadComponent('TipoPresentes');
    	$tiposPresentes = $this->TipoPresentes->getArrayTipoPresentes();
    	$ClasesAlumnos = $this->SeguimientosPrograma->ClasesAlumnos->find('list', ['limit' => 200]);
    	$this->set(compact('seguimientosPrograma', 'ClasesAlumnos','tiposPresentes'));
    	$this->set('_serialize', ['seguimientosClasesAlumno']);
    	$this->render('/SeguimientosPrograma/edit/');
    	
    }
    
    /**
     * Edit method
     *
     * @param string|null $id Seguimientos Clases Alumno id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
    	$seguimientosPrograma = $this->SeguimientosPrograma->get($id, [
    			'contain' => []
    	]);
    	if ($this->request->is(['patch', 'post', 'put'])) {
    		$seguimientosPrograma= $this->SeguimientosPrograma->patchEntity($seguimientosPrograma, $this->request->getData());
    		if ($this->SeguimientosPrograma->save($seguimientosPrograma)) {
    			$this->Flash->success(__('Seguimiento guardado'));
    			
    			$url = ['action' => 'index'];
    			if($this->Auth->user('rol_id') === OPERADOR)
    			{
    				$url = ['action' => 'oIndex'];
    			}
    			return $this->redirect($url);
    		}
    		$this->Flash->error(__('El seguimiento no ha podido guardarse, reintente!.'));
    	}
    	$this->loadComponent('TipoPresentes');
     	$tiposPresentes = $this->TipoPresentes->getArrayTipoPresentes();
    	$ClasesAlumnos = $this->SeguimientosPrograma->ClasesAlumnos->find('list', ['limit' => 200]);
    	$this->set(compact('seguimientosPrograma', 'ClasesAlumnos','tiposPresentes'));
    }
    public function oIndex()
    {
        $this->paginate = [
            'conditions' => ['SeguimientosPrograma.created = SeguimientosPrograma.modified',
                'DATE(SeguimientosPrograma.fecha) <= ' => date('Y-m-d'),'clases.operador_id' => $this->Auth->user('operador_id'),
                'YEAR(Ciclolectivo.fecha_inicio)' => date('Y')],
            'contain' => ['ClasesAlumnos' => ['Alumnos','Clases' => ['Disciplinas','Horarios' => ['Ciclolectivo'],'Profesores'] ]],
            'finder' => 'Ordered',
        ];
        $seguimientosPrograma = $this->paginate($this->SeguimientosPrograma);
        $mensaje['Se buscó: '][0]= 'Seguimientos que me faltan cargar hasta hoy.';
        
        $this->set(compact('seguimientosPrograma','mensaje'));
    }
    
    public function oPorDia()
    {
        $operador_id = $this->Auth->user('operador_id');
        $dia =  date('l');
        $fecha = date('Y-m-d');
        
        $rFechas = $this->SeguimientosPrograma->find('all')
        ->select('fecha')
        ->contain(['ClasesAlumnos' => ['Clases' => ['Horarios' => ['Ciclolectivo']]]])
        ->where(['Clases.operador_id' => $operador_id,
            'SeguimientosPrograma.created = SeguimientosPrograma.modified',
            'DATE(SeguimientosPrograma.fecha) <=' => date('Y-m-d'),
            'YEAR(Ciclolectivo.fecha_inicio)' => date('Y')
        ])
        ->distinct('fecha');
        
        
        
        
        if ($rFechas->count() > 0)
        {
            $fechas = array();
            foreach ($rFechas as $f)
            {
                $fechas[$f->fecha->format('d-m-Y')]=$f->fecha->format('d-m-Y');
            }
        }
        else
        {
            $fechas = false;
        }
        if ($this->request->is('post'))
        {
            if(!empty($this->request->getData()) && $this->request->getData() !== null )
            {
                if ( $fecha = $this->request->getData()['fechas'] != '')
                {
                    $fecha = $this->request->getData()['fechas'];
                    $dia = date('l',strtotime($fecha));
                }
            }
        }
        
        $clasesHorarios = TableRegistry::get('Clases')->find('all')
        ->select(['Horarios.id'])
        ->contain(['Horarios' => ['Ciclolectivo' => ['conditions' => ['YEAR(Ciclolectivo.fecha_inicio)' => date('Y')]]]])
        ->where(['Clases.operador_id' => $operador_id, 'Horarios.nombre_dia' =>$dia]);
        
        $horarios = TableRegistry::get('Horarios')->find('all')
        
        ->contain(['Clases' => ['conditions' => ['Clases.operador_id' => $operador_id]]])
        ->where(['Horarios.id IN' => $clasesHorarios])
        ->orderAsc("hora");
        
        
        $fecha =  bin2hex ($fecha);
        $this->set(compact('horarios','fechas','dia','fecha'));
    }
    
    public function oCargaMultiple($idClase, $fecha)
    {
        $fecha = hex2bin($fecha);
        
        $seguimientos = $this->SeguimientosPrograma->find('all')
        ->contain(['ClasesAlumnos' => ['Alumnos','Clases']])
        ->where(['Clases.id' => $idClase, 'DATE(fecha)' => date('Y-m-d',strtotime($fecha)),
            'SeguimientosPrograma.created = SeguimientosPrograma.modified'
        ])
        ->toArray();
        
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            
            if ($this->request->getData()['id'] != '')
            {
                $id = $this->request->getData()['id'];
                $seguimientos = $this->SeguimientosPrograma->get($id);
                $seguimientos = $this->SeguimientosPrograma->patchEntity($seguimientos, $this->request->getData());
                if ($this->SeguimientosPrograma->save($seguimientos)) {
                    $this->Flash->success(__('Seguimiento guardado'));
                    
                    return $this->redirect($this->referer());
                }
                $this->Flash->error(__('El seguimiento no ha podido guardarse, reintente!.'));
            }
        }
        $this->loadComponent('TipoPresentes');
        $tiposPresentes = $this->TipoPresentes->getArrayTipoPresentes();
        $clase = TableRegistry::get('Clases')->get($idClase);
        $ClasesAlumnos = $this->SeguimientosPrograma->ClasesAlumnos->find('list');
        $this->set(compact('seguimientos', 'calificaciones','clase','fecha','tiposPresentes'));
        
    }
    
    public function oSearch()
    {
        $wherePalabraClave= $whereDisciplinas =	$whereClase = $whereFecha = $whereYaCargados
        = $whereFaltanCargar  = $palabra = $mensaje = $whereHastaHoy =null;
        
        $whereOperador = ['Clases.operador_id' => $this->Auth->user('operador_id')];
        
        if ($this->request->is('post'))
        {
            if(!empty($this->request->getData()) && $this->request->getData() !== null )
            {
                if(!empty($this->request->getData()) && $this->request->getData() !== null )
                {
                    if ($this->request->getData()['faltantes'])
                    {
                        $whereFaltanCargar= 'SeguimientosPrograma.created = SeguimientosPrograma.modified';
                        $mensaje ['Se buscó por']["Seguimientos :"] = ["Faltantes de cargar"];
                    }
                    if ($this->request->getData()['modificados'])
                    {
                        $whereYaCargados= 'SeguimientosPrograma.created <> SeguimientosPrograma.modified';
                        $mensaje ['Se buscó por']["Seguimientos :"] = ["Ya cargados"];
                    }
                    if (!(empty($this->request->getData()['disciplinas'])))
                    {
                        $disc = $this->request->getData()['disciplinas'];
                        $whereDisciplinas= ["Clases.disciplina_id = $disc"];
                        $discTable = TableRegistry::get("Disciplinas");
                        $disciplina = $discTable->get($disc);
                        $mensaje ['Se buscó por']["Disciplina :"]=   [$disciplina->descripcion];
                    }
                    if (!(empty($this->request->getData()['clases'])))
                    {
                        $clase = $this->request->getData()['clases'];
                        $whereClase= ["clases.id = $clase"];
                        $clasesTable = TableRegistry::get("Clases");
                        $clase = $clasesTable->get($clase);
                        $mensaje ['Se buscó por']["Clase de :"]=   [$clase->presentacionCorta];
                    }
                    
                    $year= $this->request->getData()['year']['year'];
                    if ($year)
                    {
                        $fecha =date('Y-m-d',strtotime("$year-01-01"));
                        $whereFecha = ["YEAR(fecha) = YEAR('$fecha')"];
                        $hoy =date('Y-m-d');
                        $whereHastaHoy = ["DATE(fecha) <=  '$hoy'"];
                        $mensaje['Se buscó por']["Año :"]=  [date('Y',strtotime($fecha))];
                    }
                    else {
                        $fecha =date('Y-m-d');
                        $whereFecha = ["YEAR(fecha) = YEAR('$fecha')"];
                        $hoy =date('Y-m-d');
                        $whereHastaHoy = ["DATE(fecha) <=  '$hoy'"];
                        $mensaje['Se buscó por']["Año :"]=  [date('Y',strtotime($fecha))];
                    }
                    if (!(empty($this->request->getData()['palabra_clave'])))
                    {
                        $palabra = $this->request->getData()['palabra_clave'];
                        $wherePalabraClave=  ["(alumnos.nombre LIKE '%".addslashes($palabra)."%' OR alumnos.apellido LIKE '%".addslashes($palabra)."%' OR
								 alumnos.nro_documento LIKE '%".addslashes($palabra)."%' OR  CONCAT_WS(' ',alumnos.nombre ,alumnos.apellido) LIKE '".addslashes($palabra)."'
		     				OR  CONCAT_WS(' ',alumnos.apellido ,alumnos.nombre) LIKE '".addslashes($palabra)."'
								)"
                        ];
                        $mensaje['Se buscó por']["Alumno :"] = [$palabra] ;
                    }
                    
                    $this->request->session()->write('searchCond', [$whereHastaHoy,$wherePalabraClave,$whereFecha,$whereClase,$whereYaCargados,$whereFaltanCargar,$whereOperador,$whereDisciplinas]);
                    $this->request->session()->write('search_key', $palabra);
                }
            }
        }
        if ($this->request->session()->check('searchCond')) {
            $conditions = $this->request->session()->read('searchCond');
        } else {
            $conditions = null;
        }
        
        $this->paginate = [
            'contain' => ['ClasesAlumnos' => ['Alumnos','Clases' => ['Disciplinas','Horarios' => ['Ciclolectivo'],'Operadores'] ]],
            'conditions' => [$conditions],
            'finder' => 'ordered',
            
        ];
        $seguimientosPrograma = $this->paginate($this->SeguimientosPrograma);
        
        
        
        $this->set(compact('seguimientosPrograma','mensaje'));
        $this->render('/SeguimientosPrograma/o_index');
    }
    public  function informe()
    {
        if ($this->request->is('post'))
        {
            $alumno = null;
            $clase = null;
            if($this->request->getData('clases') && $this->request->getData('alumnos'))
            {
                $idClase = $this->request->getData('clases');
                $idAlumno = $this->request->getData('alumnos');
                $alumno = TableRegistry::get('Alumnos')->get($idAlumno);
                $clase= TableRegistry::get('Clases')->get($idClase,['contain' => 'Disciplinas']);
                
                return  $this->redirect(['action' => 'listado_pdf',$idAlumno,$idClase,'_ext' => 'pdf']);
            }
        }
        
        $this->set('seg');
    }
    
    public function listadoPdf($idAlumno,$idClase)
    {
        $seguimientos = $this->SeguimientosPrograma->find('all',[
            'contain' => ['ClasesAlumnos'],
            'order' => ['SeguimientosPrograma.fecha' => 'ASC']
            
        ])
        ->matching('ClasesAlumnos.Alumnos', function ($q) use($idAlumno){
            return $q->where(['Alumnos.id' => $idAlumno]);
        })
        ->matching('ClasesAlumnos.Clases', function ($q) use($idClase){
            return $q->where(['Clases.id' => $idClase]);
        })
        ->where(['DATE(SeguimientosPrograma.fecha) <= ' => date('Y-m-d')])
        ->order('SeguimientosPrograma.fecha')
        ;
        
        
        $alumno = TableRegistry::get('Alumnos')->get($idAlumno);
        $clase = TableRegistry::get('Clases')->get($idClase,
            [
                'contain' => ['Profesores','Operadores','Disciplinas']
            ]);
        $this->prepararListadoSeguimiento($clase->disciplina->descripcion, $alumno->presentacion, "A4", "portrait");
        
        //     	->matching('ClasesAlumnos.Clases.Profesores', function ($q) use($idClase){
        //     		return $q->where(['Clases.id' => $idClase]);
        //     	})->toArray();
        $this->set(compact('seguimientos','clase','alumno'));
    }
    
    public function reset()
    {
        if ($this->request->session()->check('searchCond')) {
            $this->request->session()->delete('searchCond');
        }
        $this->redirect("/SeguimientosPrograma/index");
    }
    public function oReset()
    {
        if ($this->request->session()->check('searchCond')) {
            $this->request->session()->delete('searchCond');
        }
        $this->redirect("/SeguimientosPrograma/o_index");
    }
    public function getOperadoresPorAnio() {
        $this->autoRender = false; // We don't render a view in this example
        $year = $this->request->getQuery('year');
        $operadores = TableRegistry::get('Operadores')->find('all')
        ->distinct('Operadores.id')
        ->matching('Clases.Horarios.Ciclolectivo')
        ->where(['YEAR(Ciclolectivo.fecha_inicio)' => $year])
        ->order(['Operadores.nombre','Operadores.apellido'])
        ;
        $i = 0;
        foreach ($operadores  as $d){
            $i++;
            
            if($i != $operadores->count())
            {
                echo $d->id.'-'.$d->presentacion.".";
            }
            else {
                echo $d->id.'-'.$d->presentacion;
            }
        }
        //print $array;
        exit;
    }
    public function getDisciplinas() {
        $this->autoRender = false; // We don't render a view in this example
        $operador_id = $this->request->getQuery('operador_id');
        $year = $this->request->getQuery('year');
        $discs = TableRegistry::get('Disciplinas')->find('all')
        //	->select(['Disciplinas.id' => 'id','Disciplinas.descripcion' => 'desc' ])
        ->distinct('Disciplinas.descripcion')
        ->matching('Clases.Horarios.Ciclolectivo')
        ->where(['Clases.operador_id' => $operador_id, 'YEAR(Ciclolectivo.fecha_inicio)' => $year])
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
        $disciplina_id = $this->request->getQuery('idDisciplina');
        $operador_id= $this->request->getQuery('operador_id');
        $year = $this->request->getQuery('year');
        $clases = TableRegistry::get('Clases')->find('all')
        //	->select(['Disciplinas.id' => 'id','Disciplinas.descripcion' => 'desc' ])
        ->contain(['Disciplinas','Horarios' => ['Ciclolectivo']])
        ->where(['Clases.operador_id' => $operador_id, 'Clases.disciplina_id' => $disciplina_id,'YEAR(Ciclolectivo.fecha_inicio)' => $year])
        //->find('currentYear')
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
    
    public function getAlumnoClase()
    {
        $this->autoRender = false; // We don't render a view in this example
        $clase = $this->request->getQuery('clase');
        $clases = TableRegistry::get('Clases')->find('all')
        ->select(['alumnos.id',"alumnos.apellido" ,"alumnos.nombre"])
        ->matching('Alumnos')
        ->where(['Clases.id' => $clase])
        ->order('Alumnos.apellido','Alumnos.nombre')
        ;
        $i = 0;
        foreach ($clases as $c){
            $i++;
            if($i != $clases->count())
            {
                echo  $c->alumnos['id']."-".$c->alumnos['apellido']." ".$c->alumnos['nombre'].".";
            }
            else {
                echo $c->alumnos['id']."-".$c->alumnos['apellido']." ".$c->alumnos['nombre'];
            }
            
            
        }
        
        exit;
    }

    private function prepararListadoSeguimiento($clase,$alumno,$tipoHoja,$orientacion)
    {
        $this->viewBuilder()->setOptions([
            'pdfConfig' => [
                'margin-bottom' => 0,
                'margin-right' => 0,
                'margin-left' => 0,
                'margin-top' => 0,
                'pageSize' => $tipoHoja,
                'orientation' => $orientacion,
                'filename' => "Seguimientos  de ".$alumno.' en '.$clase.'.pdf'
            ]
        ]);
    }

}
