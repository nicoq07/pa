<?php
namespace App\Controller;

use App\Controller\AppController;

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
			if(in_array($this->request->action, ['oIndex','edit','view','oSearch','addProfesor','reset']))
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
        $clases = $this->SeguimientosPrograma->ClasesAlumnos->Clases->find('list')->find('ordered')->contain('Horarios');
        
        $this->paginate = [
        		'contain' => ['ClasesAlumnos' => ['Alumnos','Clases' => ['Disciplinas','Horarios','Profesores','Operadores'] ]],
        		'conditions' => ['SeguimientosPrograma.created = SeguimientosPrograma.modified'],
        		'finder' => 'ordered'
        ];
        $seguimientosPrograma = $this->paginate($this->SeguimientosPrograma);
        $this->set(compact('seguimientosPrograma','clases'));
    }
    public function search()
    {
    	$where2 = $where3 = $where4 = $where5 = $palabra = null;
    	if ($this->request->is('post'))
    	{
    		if(!empty($this->request->getData()) && $this->request->getData() !== null )
    		{
    			if ($this->request->getData()['modificados'])
    			{
    				$where5= 'seguimientosPrograma.created <> seguimientosPrograma.modified';
    			}
    			
    			if (!(empty($this->request->getData()['clases'])))
    			{
    				$clase = $this->request->getData()['clases'];
    				$where2= ["clases.id = $clase"];
    			}
    			
    			$mes= $this->request->getData()['mob']['month'];
    			$year= $this->request->getData()['year']['year'];
    			if ($year && $mes)
    			{
    				$fecha =date('Y-m-d h:i:s',strtotime("$year-$mes-01"));
    				$where3 = ["EXTRACT(YEAR_MONTH FROM fecha) = EXTRACT(YEAR_MONTH FROM '$fecha')"];
    			}
    			elseif ($year)
    			{
    				$fecha =date('Y-m-d',strtotime("$year-01-01"));
    				$where3 = ["YEAR(fecha) = YEAR('$fecha')"];
    			}
    			elseif ($mes)
    			{
    				$fecha =date('Y-m-d',strtotime("2000-$mes-01"));
    				$where3 = ["MONTH(fecha) = MONTH('$fecha')"];
    			}
    			if (!(empty($this->request->getData()['palabra_clave'])))
    			{
    				$palabra = $this->request->getData()['palabra_clave'];
    				$where4= ["(alumnos.nombre LIKE '%".addslashes($palabra)."%' OR alumnos.apellido LIKE '%".addslashes($palabra)."%' OR
							 alumnos.nro_documento LIKE '%".addslashes($palabra)."%' OR  CONCAT_WS(' ',alumnos.nombre ,alumnos.apellido) LIKE '".addslashes($palabra)."'
	     				OR  CONCAT_WS(' ',alumnos.apellido ,alumnos.nombre) LIKE '".addslashes($palabra)."'
							OR profesores.nombre LIKE '%".addslashes($palabra)."%'  OR profesores.apellido LIKE '%".addslashes($palabra)."%'
							OR operadores.nombre LIKE '%".addslashes($palabra)."%'  OR operadores.apellido LIKE '%".addslashes($palabra)."%')"
    				];
    			}
    			$this->request->session()->write('searchCond', [$where2,$where3,$where4,$where5]);
    			$this->request->session()->write('search_key', $palabra);
    		}
    	}
    	
    	if ($this->request->session()->check('searchCond')) {
    		$conditions = $this->request->session()->read('searchCond');
    	} else {
    		$conditions = null;
    	}
    	
    	$this->paginate = [
    			'contain' => ['ClasesAlumnos' => ['Alumnos','Clases' => ['Disciplinas','Horarios','Profesores','Operadores'] ]],
    			'conditions' => $conditions,
    			'limit' => 20
    	];
    	
    	$clases = $this->SeguimientosPrograma->ClasesAlumnos->Clases->find('list')->find('ordered')->contain('Horarios');
    	
    	$seguimientosPrograma= $this->paginate($this->SeguimientosPrograma);
    	
    	$this->set(compact('seguimientosPrograma','clases'));
    	
    	$this->render('/seguimientosPrograma/index');
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
    		$seguimientosClasesAlumno = $this->SeguimientosPrograma->patchEntity($seguimientosClasesAlumno, $this->request->getData());
    		if ($this->SeguimientosPrograma->save($seguimientosClasesAlumno)) {
    			$this->Flash->success(__('Seguimiento guardado'));
    			$url = ['controller' => 'Clases' ,'action' => 'pView', $seguimientosClasesAlumno->clases_alumno->clase_id];
    			return $this->redirect($url);
    		}
    		$this->Flash->error(__('El seguimiento no ha podido guardarse, reintente!.'));
    	}
    	$ClasesAlumnos = $this->SeguimientosPrograma->ClasesAlumnos->find('list', ['limit' => 200]);
    	$this->set(compact('seguimientosPrograma', 'ClasesAlumnos'));
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
    	$ClasesAlumnos = $this->SeguimientosPrograma->ClasesAlumnos->find('list', ['limit' => 200]);
    	$this->set(compact('seguimientosPrograma', 'ClasesAlumnos'));
    }
    public function oIndex()
    {
    	$form = 'oSearch';
    	$where = null;
    	$session = $this->request->session();
    	$session->delete('where');
    	if ($this->request->is('post'))
    	{
    		
    		$where1 = null;
    		if (!(empty($this->request->getData()['clases'])))
    		{
    			$clase = $this->request->getData()['clases'];
    			$where1= ["clases.id = $clase"];
    		}
    		$session->write('where',[$where1]);
    		
    	}
    	
    	if ($session->check('where'))
    	{
    		$where = $session->read('where');
    	}
    	else
    	{
    		$where = null;
    	}
    	$clases = $this->SeguimientosPrograma->ClasesAlumnos->Clases->find('list')->find('ordered')->contain('Horarios')
    	->where(['Clases.operador_id' => $this->Auth->user('operador_id')]);
    	
    	$this->paginate = [
    			'conditions' => ['SeguimientosPrograma.created = SeguimientosPrograma.modified',$where, 'fecha <= ' => date('Y-m-d'),'clases.operador_id' => $this->Auth->user('operador_id')],
    			'contain' => ['ClasesAlumnos' => ['Alumnos','Clases' => ['Disciplinas','Horarios','Operadores'] ]],
    			'finder' => 'ordered'
    	];
    	$seguimientosProgramas = $this->paginate($this->SeguimientosPrograma);
    	
    	
    	
    	$this->set(compact('seguimientosProgramas','clases','form'));
    }
    
    public function oSearch()
    {
    	$form = 'oSearch';
    	$where1 = $where2 = $where3 = $where4 =null;
    	if ($this->request->is('post'))
    	{
    		if(!empty($this->request->getData()) && $this->request->getData() !== null )
    		{
    			//debug($this->request->getData());die;
    			if (!(empty($this->request->getData()['clases'])))
    			{
    				$clase = $this->request->getData()['clases'];
    				$where1= ["clases.id = $clase"];
    			}
    			$day= $this->request->getData()['fecha']['day'];
    			$month= $this->request->getData()['fecha']['month'];
    			$year = date('Y');
    			if (!empty($day) && !empty($month))
    			{
    				$fecha =date('Y-m-d',strtotime("$year-$month-$day"));
    				$where2 = ["DATE(fecha) = '$fecha'"];
    			}
    			elseif ($month)
    			{
    				$fecha =date('Y-m-d',strtotime("$year-$month-01"));
    				$where2 = ["EXTRACT(YEAR_MONTH FROM fecha) = EXTRACT(YEAR_MONTH FROM '$fecha')"];
    			}
    			//debug($where2); die;
    			if ($this->request->getData()['modificados'])
    			{
    				$where3= 'SeguimientosPrograma.created <> SeguimientosPrograma.modified';
    			}
    			if (!(empty($this->request->getData()['palabra_clave'])))
    			{
    				$palabra = $this->request->getData()['palabra_clave'];
    				$where4= ["(alumnos.nombre LIKE '%".addslashes($palabra)."%' OR alumnos.apellido LIKE '%".addslashes($palabra)."%' OR
							 CONCAT_WS(' ',alumnos.nombre ,alumnos.apellido) LIKE '".addslashes($palabra)."'
	     				OR  CONCAT_WS(' ',alumnos.apellido ,alumnos.nombre) LIKE '".addslashes($palabra)."')"
    				];
    			}
    			
    			$this->request->session()->write('searchCond', [$where1,$where2,$where3,$where4]);
    		}
    	}
    	
    	if ($this->request->session()->check('searchCond')) {
    		$conditions = $this->request->session()->read('searchCond');
    	} else {
    		$conditions = null;
    	}
    	
    	$this->paginate = [
    			'contain' => ['ClasesAlumnos' => ['Alumnos','Clases' => ['Disciplinas','Horarios','Profesores','Operadores'] ]],
    			'conditions' => [$conditions, 'DATE(fecha) <= ' => date('Y-m-d'),'clases.operador_id' => $this->Auth->user('operador_id')],
    			'finder' => 'ordered',
    			'limit' => 20
    	];
    	
    	$clases = $this->SeguimientosPrograma->ClasesAlumnos->Clases->find('list')->find('ordered')->contain('Horarios');
    	
    	$seguimientosProgramas= $this->paginate($this->SeguimientosPrograma);
    	
    	$this->set(compact('seguimientosProgramas','clases','form'));
    	
    	$this->render('/SeguimientosPrograma/o_index');
    }

    public function reset()
    {
    	if ($this->request->session()->check('searchCond')) {
    		$this->request->session()->delete('searchCond');
    	}
    	$this->redirect($this->referer());
    }


}
