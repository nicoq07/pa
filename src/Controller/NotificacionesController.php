<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;


/**
 * Notificaciones Controller
 *
 * @property \App\Model\Table\NotificacionesTable $Notificaciones
 *
 * @method \App\Model\Entity\Notificacione[] paginate($object = null, array $settings = [])
 */
class NotificacionesController extends AppController
{
	
	public function isAuthorized($user)
	{
		
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
    			'limit' => 200,
    			'conditions' => ['Notificaciones.receptor' => $this->Auth->user('id')],
    			'order' => ['Notificaciones.created' => 'desc']];
    	$notificaciones = $this->paginate($this->Notificaciones);
    	$users = $this->Notificaciones->Users->find('list')->toArray();
    	$this->set(compact('notificaciones','users'));
    	$this->set('_serialize', ['notificaciones']);
    }

    /**
     * View method
     *
     * @param string|null $id Notificacione id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $notificacione = $this->Notificaciones->get($id, [
            'contain' => []
        ]);

        $this->set('notificacione', $notificacione);
        $this->set('_serialize', ['notificacione']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
    	$notificacione = $this->Notificaciones->newEntity();
    	if ($this->request->is('post')) {
    		$notificacione = $this->Notificaciones->patchEntity($notificacione, $this->request->data);
    		$notificacione['emisor'] = $this->Auth->user('id');
    		$notificacione['leida'] = false;
    		if ($notificacione['broadcast'])
    		{
    			$users = TableRegistry::get('Users');
    			$users = $users->find('all')
    			->where(['Users.id <>' => $this->Auth->user('id')]);
    			foreach ($users as $user)
    			{
    				$query = $this->Notificaciones->query();
    				$query->insert(['descripcion', 'emisor','receptor','leida','broadcast','created'])
    				->values([
    						'descripcion' => $notificacione['descripcion'],
    						'emisor' => $notificacione['emisor'],
    						'receptor' => $user->id,
    						'leida' => false,
    						'broadcast' => true,
    						'created' => new \DateTime('now')]
    						, ['created' => 'datetime'])
    						->execute();
    						
    			}
    			$this->Flash->success(__('Mensajes enviados.'));
    			
    			return $this->redirect(['action' => 'index']);
    		}
    			if ($this->Notificaciones->save($notificacione)) {
    				$this->Flash->success(__('Mensaje enviado.'));
    				
    				return $this->redirect(['action' => 'index']);
    			}
    			$this->Flash->error(__('Error al enviar el mensaje'));
    		}
    		$users = $this->Notificaciones->Users->find('list')
    		->where(['Users.id <>' => $this->Auth->user('id')])
    		;
    		$this->set(compact('notificacione','users'));
    		$this->set('_serialize', ['notificacione']);
    }

    public function addOperador()
    {
    	$this->autoRender = false;
    	$notificacione = $this->Notificaciones->newEntity();
    	if ($this->request->is('post')) {
    		$notificacione = $this->Notificaciones->patchEntity($notificacione, $this->request->getData());
    		$notificacione['emisor'] = $this->Auth->user('id');
    		$notificacione['leida'] = false;
    		if ($this->Notificaciones->save($notificacione)) {
    			$this->Flash->success(__('Mensaje enviado.'));
    			
    			return $this->redirect(['action' => 'index']);
    		}
    		$this->Flash->error(__('Error al enviar el mensaje'));
    	}
    	$users = $this->Notificaciones->Users->find('list')
    	->where(['Users.id <>' => $this->Auth->user('id')])
    	;
    	$this->set(compact('notificacione','users'));
    	$this->render('/Notificaciones/add');
    }
    /**
     * Edit method
     *
     * @param string|null $id Notificacione id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $notificacione = $this->Notificaciones->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $notificacione = $this->Notificaciones->patchEntity($notificacione, $this->request->getData());
            if ($this->Notificaciones->save($notificacione)) {
                $this->Flash->success(__('The notificacione has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The notificacione could not be saved. Please, try again.'));
        }
        $this->set(compact('notificacione'));
        $this->set('_serialize', ['notificacione']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Notificacione id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $notificacione = $this->Notificaciones->get($id);
        if ($this->Notificaciones->delete($notificacione)) {
            $this->Flash->success(__('The notificacione has been deleted.'));
        } else {
            $this->Flash->error(__('The notificacione could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
    public function enviadas()
    {
    	$this->paginate = [
    			'limit' => 200,
    			'conditions' => ['Notificaciones.emisor' => $this->Auth->user('id')],
    			'order' => ['Notificaciones.created' => 'desc']];
    	$notificaciones = $this->paginate($this->Notificaciones);
    	$users = $this->Notificaciones->Users->find('list')->toArray();
    	$this->set(compact('notificaciones','users'));
    }
    
    
    public function chat()
    {
    	$notificacione = $this->Notificaciones->newEntity();
    	if ($this->request->is('post')) {
    		$notificacione = $this->Notificaciones->patchEntity($notificacione, $this->request->getData());
    		if ($this->Notificaciones->save($notificacione)) {
    			$this->Flash->success(__('The notificacione has been saved.'));
    			
    			return $this->redirect(['action' => 'index']);
    		}
    		$this->Flash->error(__('The notificacione could not be saved. Please, try again.'));
    	}
    	$this->set(compact('notificacione'));
    	$this->set('_serialize', ['notificacione']);
    }
    
    
    public function marcarLeida()
    {
    	$this->autoRender = false; // We don't render a view in this example
    	$mensaje_id = $this->request->getQuery('mensajeId');
    	$notificacione = $this->Notificaciones->get($mensaje_id);
    	$notificacione->leida = true;
    		if ($this->Notificaciones->save($notificacione)) {
    			echo true;
    		}
    		else {
    			echo false;
    		}
    	
    	exit;
    }
    
}
