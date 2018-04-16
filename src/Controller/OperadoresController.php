<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Operadores Controller
 *
 * @property \App\Model\Table\OperadoresTable $Operadores
 *
 * @method \App\Model\Entity\Operadore[] paginate($object = null, array $settings = [])
 */
class OperadoresController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $operadores = $this->paginate($this->Operadores);

        $this->set(compact('operadores'));
        $this->set('_serialize', ['operadores']);
    }

    /**
     * View method
     *
     * @param string|null $id Operadore id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $operadore = $this->Operadores->get($id, [
            'contain' => []
        ]);

        $this->set('operadore', $operadore);
        $this->set('_serialize', ['operadore']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $operadore = $this->Operadores->newEntity();
        if ($this->request->is('post')) {
            $operadore = $this->Operadores->patchEntity($operadore, $this->request->getData());
            if ($this->Operadores->save($operadore)) {
                $this->Flash->success(__('The operadore has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The operadore could not be saved. Please, try again.'));
        }
        $this->set(compact('operadore'));
        $this->set('_serialize', ['operadore']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Operadore id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $operadore = $this->Operadores->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $operadore = $this->Operadores->patchEntity($operadore, $this->request->getData());
            if ($this->Operadores->save($operadore)) {
                $this->Flash->success(__('The operadore has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The operadore could not be saved. Please, try again.'));
        }
        $this->set(compact('operadore'));
        $this->set('_serialize', ['operadore']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Operadore id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $operadore = $this->Operadores->get($id);
        if ($this->Operadores->delete($operadore)) {
            $this->Flash->success(__('The operadore has been deleted.'));
        } else {
            $this->Flash->error(__('The operadore could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
