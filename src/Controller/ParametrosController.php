<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Parametros Controller
 *
 *
 * @method \App\Model\Entity\Parametro[] paginate($object = null, array $settings = [])
 */
class ParametrosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $parametros = $this->paginate($this->Parametros);

        $this->set(compact('parametros'));
        $this->set('_serialize', ['parametros']);
    }

    /**
     * View method
     *
     * @param string|null $id Parametro id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $parametro = $this->Parametros->get($id, [
            'contain' => []
        ]);

        $this->set('parametro', $parametro);
        $this->set('_serialize', ['parametro']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $parametro = $this->Parametros->newEntity();
        if ($this->request->is('post')) {
            $parametro = $this->Parametros->patchEntity($parametro, $this->request->getData());
            if ($this->Parametros->save($parametro)) {
                $this->Flash->success(__('The parametro has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The parametro could not be saved. Please, try again.'));
        }
        $this->set(compact('parametro'));
        $this->set('_serialize', ['parametro']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Parametro id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $parametro = $this->Parametros->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $parametro = $this->Parametros->patchEntity($parametro, $this->request->getData());
            if ($this->Parametros->save($parametro)) {
                $this->Flash->success(__('The parametro has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The parametro could not be saved. Please, try again.'));
        }
        $this->set(compact('parametro'));
        $this->set('_serialize', ['parametro']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Parametro id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $parametro = $this->Parametros->get($id);
        if ($this->Parametros->delete($parametro)) {
            $this->Flash->success(__('The parametro has been deleted.'));
        } else {
            $this->Flash->error(__('The parametro could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    public function cambiarEstado()
    {
    	$this->autoRender = false; // We don't render a view in this example
    	$id = $this->request->getData('id');
    	$parametro = $this->Parametros->get($id);
    	if ($parametro->valor)
    	{
    		$parametro->valor = false;
    	}
    	else
    	{
    		$parametro->valor = true;
    	}
    	
    	if ($this->Parametros->save($parametro)) 
    	{
    		echo '1';
    		exit;
    	}
    	
    	exit;
    }
}
