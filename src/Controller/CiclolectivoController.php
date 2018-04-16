<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Ciclolectivo Controller
 *
 * @property \App\Model\Table\CiclolectivoTable $Ciclolectivo
 *
 * @method \App\Model\Entity\Ciclolectivo[] paginate($object = null, array $settings = [])
 */
class CiclolectivoController extends AppController
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
    	
        $ciclolectivo = $this->paginate($this->Ciclolectivo);

        $this->set(compact('ciclolectivo'));
        $this->set('_serialize', ['ciclolectivo']);
    }

    /**
     * View method
     *
     * @param string|null $id Ciclolectivo id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ciclolectivo = $this->Ciclolectivo->get($id, [
            'contain' => ['Horarios']
        ]);

        $this->set('ciclolectivo', $ciclolectivo);
        $this->set('_serialize', ['ciclolectivo']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ciclolectivo = $this->Ciclolectivo->newEntity();
        if ($this->request->is('post')) {
            $ciclolectivo = $this->Ciclolectivo->patchEntity($ciclolectivo, $this->request->getData());
            if ($this->Ciclolectivo->save($ciclolectivo)) {
                $this->Flash->success(__('The ciclolectivo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ciclolectivo could not be saved. Please, try again.'));
        }
        $this->set(compact('ciclolectivo'));
        $this->set('_serialize', ['ciclolectivo']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Ciclolectivo id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ciclolectivo = $this->Ciclolectivo->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ciclolectivo = $this->Ciclolectivo->patchEntity($ciclolectivo, $this->request->getData());
            if ($this->Ciclolectivo->save($ciclolectivo)) {
                $this->Flash->success(__('The ciclolectivo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ciclolectivo could not be saved. Please, try again.'));
        }
        $this->set(compact('ciclolectivo'));
        $this->set('_serialize', ['ciclolectivo']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Ciclolectivo id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ciclolectivo = $this->Ciclolectivo->get($id);
        if ($this->Ciclolectivo->delete($ciclolectivo)) {
            $this->Flash->success(__('The ciclolectivo has been deleted.'));
        } else {
            $this->Flash->error(__('The ciclolectivo could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
