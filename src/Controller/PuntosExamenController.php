<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PuntosExamen Controller
 *
 * @property \App\Model\Table\PuntosExamenTable $PuntosExamen
 *
 * @method \App\Model\Entity\PuntosExaman[] paginate($object = null, array $settings = [])
 */
class PuntosExamenController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Examenes', 'Calificaciones']
        ];
        $puntosExamen = $this->paginate($this->PuntosExamen);

        $this->set(compact('puntosExamen'));
        $this->set('_serialize', ['puntosExamen']);
    }

    /**
     * View method
     *
     * @param string|null $id Puntos Examan id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $puntosExaman = $this->PuntosExamen->get($id, [
            'contain' => ['Examenes', 'Calificaciones']
        ]);

        $this->set('puntosExaman', $puntosExaman);
        $this->set('_serialize', ['puntosExaman']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $puntosExaman = $this->PuntosExamen->newEntity();
        if ($this->request->is('post')) {
            $puntosExaman = $this->PuntosExamen->patchEntity($puntosExaman, $this->request->getData());
            if ($this->PuntosExamen->save($puntosExaman)) {
                $this->Flash->success(__('The puntos examan has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The puntos examan could not be saved. Please, try again.'));
        }
        $examenes = $this->PuntosExamen->Examenes->find('list', ['limit' => 200]);
        $calificaciones = $this->PuntosExamen->Calificaciones->find('list', ['limit' => 200]);
        $this->set(compact('puntosExaman', 'examenes', 'calificaciones'));
        $this->set('_serialize', ['puntosExaman']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Puntos Examan id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $puntosExaman = $this->PuntosExamen->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $puntosExaman = $this->PuntosExamen->patchEntity($puntosExaman, $this->request->getData());
            if ($this->PuntosExamen->save($puntosExaman)) {
                $this->Flash->success(__('The puntos examan has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The puntos examan could not be saved. Please, try again.'));
        }
        $examenes = $this->PuntosExamen->Examenes->find('list', ['limit' => 200]);
        $calificaciones = $this->PuntosExamen->Calificaciones->find('list', ['limit' => 200]);
        $this->set(compact('puntosExaman', 'examenes', 'calificaciones'));
        $this->set('_serialize', ['puntosExaman']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Puntos Examan id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $puntosExaman = $this->PuntosExamen->get($id);
        if ($this->PuntosExamen->delete($puntosExaman)) {
            $this->Flash->success(__('The puntos examan has been deleted.'));
        } else {
            $this->Flash->error(__('The puntos examan could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
