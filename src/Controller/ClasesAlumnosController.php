<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ClasesAlumnos Controller
 *
 * @property \App\Model\Table\ClasesAlumnosTable $ClasesAlumnos
 *
 * @method \App\Model\Entity\ClasesAlumno[] paginate($object = null, array $settings = [])
 */
class ClasesAlumnosController extends AppController
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
            'contain' => ['Alumnos', 'Clases']
        ];
        $clasesAlumnos = $this->paginate($this->ClasesAlumnos);

        $this->set(compact('clasesAlumnos'));
        $this->set('_serialize', ['clasesAlumnos']);
    }

    /**
     * View method
     *
     * @param string|null $id Clases Alumno id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $clasesAlumno = $this->ClasesAlumnos->get($id, [
            'contain' => ['Alumnos', 'Clases']
        ]);

        $this->set('clasesAlumno', $clasesAlumno);
        $this->set('_serialize', ['clasesAlumno']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $clasesAlumno = $this->ClasesAlumnos->newEntity();
        if ($this->request->is('post')) {
            $clasesAlumno = $this->ClasesAlumnos->patchEntity($clasesAlumno, $this->request->getData());
            if ($this->ClasesAlumnos->save($clasesAlumno)) {
                $this->Flash->success(__('The clases alumno has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The clases alumno could not be saved. Please, try again.'));
        }
        $alumnos = $this->ClasesAlumnos->Alumnos->find('list', ['limit' => 200]);
        $clases = $this->ClasesAlumnos->Clases->find('list', ['limit' => 200]);
        $this->set(compact('clasesAlumno', 'alumnos', 'clases'));
        $this->set('_serialize', ['clasesAlumno']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Clases Alumno id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $clasesAlumno = $this->ClasesAlumnos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $clasesAlumno = $this->ClasesAlumnos->patchEntity($clasesAlumno, $this->request->getData());
            if ($this->ClasesAlumnos->save($clasesAlumno)) {
                $this->Flash->success(__('The clases alumno has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The clases alumno could not be saved. Please, try again.'));
        }
        $alumnos = $this->ClasesAlumnos->Alumnos->find('list', ['limit' => 200]);
        $clases = $this->ClasesAlumnos->Clases->find('list', ['limit' => 200]);
        $this->set(compact('clasesAlumno', 'alumnos', 'clases'));
        $this->set('_serialize', ['clasesAlumno']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Clases Alumno id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $clasesAlumno = $this->ClasesAlumnos->get($id);
        if ($this->ClasesAlumnos->delete($clasesAlumno)) {
            $this->Flash->success(__('The clases alumno has been deleted.'));
        } else {
            $this->Flash->error(__('The clases alumno could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
