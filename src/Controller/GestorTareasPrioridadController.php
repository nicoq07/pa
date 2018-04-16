<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * GestorTareasPrioridad Controller
 *
 * @property \App\Model\Table\GestorTareasPrioridadTable $GestorTareasPrioridad
 *
 * @method \App\Model\Entity\GestorTareasPrioridad[] paginate($object = null, array $settings = [])
 */
class GestorTareasPrioridadController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $gestorTareasPrioridad = $this->paginate($this->GestorTareasPrioridad);

        $this->set(compact('gestorTareasPrioridad'));
        $this->set('_serialize', ['gestorTareasPrioridad']);
    }

    /**
     * View method
     *
     * @param string|null $id Gestor Tareas Prioridad id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $gestorTareasPrioridad = $this->GestorTareasPrioridad->get($id, [
            'contain' => []
        ]);

        $this->set('gestorTareasPrioridad', $gestorTareasPrioridad);
        $this->set('_serialize', ['gestorTareasPrioridad']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $gestorTareasPrioridad = $this->GestorTareasPrioridad->newEntity();
        if ($this->request->is('post')) {
            $gestorTareasPrioridad = $this->GestorTareasPrioridad->patchEntity($gestorTareasPrioridad, $this->request->getData());
            if ($this->GestorTareasPrioridad->save($gestorTareasPrioridad)) {
                $this->Flash->success(__('The gestor tareas prioridad has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The gestor tareas prioridad could not be saved. Please, try again.'));
        }
        $this->set(compact('gestorTareasPrioridad'));
        $this->set('_serialize', ['gestorTareasPrioridad']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Gestor Tareas Prioridad id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $gestorTareasPrioridad = $this->GestorTareasPrioridad->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $gestorTareasPrioridad = $this->GestorTareasPrioridad->patchEntity($gestorTareasPrioridad, $this->request->getData());
            if ($this->GestorTareasPrioridad->save($gestorTareasPrioridad)) {
                $this->Flash->success(__('The gestor tareas prioridad has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The gestor tareas prioridad could not be saved. Please, try again.'));
        }
        $this->set(compact('gestorTareasPrioridad'));
        $this->set('_serialize', ['gestorTareasPrioridad']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Gestor Tareas Prioridad id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $gestorTareasPrioridad = $this->GestorTareasPrioridad->get($id);
        if ($this->GestorTareasPrioridad->delete($gestorTareasPrioridad)) {
            $this->Flash->success(__('The gestor tareas prioridad has been deleted.'));
        } else {
            $this->Flash->error(__('The gestor tareas prioridad could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
