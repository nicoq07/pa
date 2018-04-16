<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * GestorTareas Controller
 *
 * @property \App\Model\Table\GestorTareasTable $GestorTareas
 *
 * @method \App\Model\Entity\GestorTarea[] paginate($object = null, array $settings = [])
 */
class GestorTareasController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
           		'contain' => ['GestorTareasPrioridad'],
        		'conditions' => ['GestorTareas.resuelta' => false],
        		'finder' => 'ordered'
        ];
        $gestorTareas = $this->paginate($this->GestorTareas);

        $this->set(compact('gestorTareas'));
    }
    
    public function indexResueltas()
    {
    	$this->paginate = [
    			'contain' => ['GestorTareasPrioridad'],
    			'conditions' => ['GestorTareas.resuelta' => true],
    			'finder' => 'ordered'
    	];
    	$gestorTareas = $this->paginate($this->GestorTareas);
    	$this->set(compact('gestorTareas'));
    	$this->render("/GestorTareas/index");
    }

    /**
     * View method
     *
     * @param string|null $id Gestor Tarea id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $gestorTarea = $this->GestorTareas->get($id, [
            'contain' => ['GestorTareasPrioridad']
        ]);

        $this->set('gestorTarea', $gestorTarea);
        $this->set('_serialize', ['gestorTarea']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $gestorTarea = $this->GestorTareas->newEntity();
        if ($this->request->is('post')) {
        	/*
        	 * 'fecha_vencimiento' => [
		'year' => '2017',
		'month' => '11',
		'day' => '06',
		'hour' => '01',
		'minute' => '00'
	]
        	 */
            $gestorTarea = $this->GestorTareas->patchEntity($gestorTarea, $this->request->getData());
            if ($this->GestorTareas->save($gestorTarea)) {
                $this->Flash->success(__('Tarea guardada.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Error, reintente!.'));
        }
        $gestorTareasPrioridad = $this->GestorTareas->GestorTareasPrioridad->find('list', ['limit' => 200]);
        $this->set(compact('gestorTarea', 'gestorTareasPrioridad'));
        $this->set('_serialize', ['gestorTarea']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Gestor Tarea id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $gestorTarea = $this->GestorTareas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $gestorTarea = $this->GestorTareas->patchEntity($gestorTarea, $this->request->getData());
            if ($this->GestorTareas->save($gestorTarea)) {
                $this->Flash->success(__('The gestor tarea has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The gestor tarea could not be saved. Please, try again.'));
        }
        $gestorTareasPrioridad = $this->GestorTareas->GestorTareasPrioridad->find('list', ['limit' => 200]);
        $this->set(compact('gestorTarea', 'gestorTareasPrioridad'));
        $this->set('_serialize', ['gestorTarea']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Gestor Tarea id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $gestorTarea = $this->GestorTareas->get($id);
        if ($this->GestorTareas->delete($gestorTarea)) {
            $this->Flash->success(__('The gestor tarea has been deleted.'));
        } else {
            $this->Flash->error(__('The gestor tarea could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
    public function marcarResuelta()
    {
    	$this->autoRender = false; // We don't render a view in this example
    	$tareaId= $this->request->getQuery('tareaId');
    	$tarea= $this->GestorTareas->get($tareaId);
    	$tarea->resuelta = true;
    	if ($this->GestorTareas->save($tarea)) {
    		echo true;
    	}
    	else {
    		echo false;
    	}
    	
    	exit;
    }
}
