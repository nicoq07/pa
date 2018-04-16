<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Calificaciones Controller
 *
 * @property \App\Model\Table\CalificacionesTable $Calificaciones
 *
 * @method \App\Model\Entity\Calificacione[] paginate($object = null, array $settings = [])
 */
class CalificacionesController extends AppController
{

	public function isAuthorized($user)
	{
		if(isset($user['rol_id']) &&  $user['rol_id'] === PROFESOR)
		{
			return false;
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
    			'finder' => 'ordered',
    	];
    	
        $calificaciones = $this->paginate($this->Calificaciones);

        
      
        
        $this->set(compact('calificaciones'));
        $this->set('_serialize', ['calificaciones']);
    }

    /**
     * View method
     *
     * @param string|null $id Calificacione id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $calificacione = $this->Calificaciones->get($id, [
            'contain' => []
        ]);

        $this->set('calificacione', $calificacione);
        $this->set('_serialize', ['calificacione']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $calificacione = $this->Calificaciones->newEntity();
        if ($this->request->is('post')) {
            $calificacione = $this->Calificaciones->patchEntity($calificacione, $this->request->getData());
            if ($this->Calificaciones->save($calificacione)) {
                $this->Flash->success(__('The calificacione has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The calificacione could not be saved. Please, try again.'));
        }
        $this->set(compact('calificacione'));
        $this->set('_serialize', ['calificacione']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Calificacione id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $calificacione = $this->Calificaciones->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $calificacione = $this->Calificaciones->patchEntity($calificacione, $this->request->getData());
            if ($this->Calificaciones->save($calificacione)) {
                $this->Flash->success(__('The calificacione has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The calificacione could not be saved. Please, try again.'));
        }
        $this->set(compact('calificacione'));
        $this->set('_serialize', ['calificacione']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Calificacione id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $calificacione = $this->Calificaciones->get($id);
        if ($this->Calificaciones->delete($calificacione)) {
            $this->Flash->success(__('The calificacione has been deleted.'));
        } else {
            $this->Flash->error(__('The calificacione could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
