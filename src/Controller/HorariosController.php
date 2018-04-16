<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Horarios Controller
 *
 * @property \App\Model\Table\HorariosTable $Horarios
 *
 * @method \App\Model\Entity\Horario[] paginate($object = null, array $settings = [])
 */
class HorariosController extends AppController
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
				'limit' => 30,
        		'contain' => ['Ciclolectivo'],
        		'finder' => 'ordered',
        ];
        $horarios = $this->paginate($this->Horarios);

        $this->set(compact('horarios'));
        $this->set('_serialize', ['horarios']);
    }

    /**
     * View method
     *
     * @param string|null $id Horario id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $horario = $this->Horarios->get($id, [
            'contain' => ['Ciclolectivo', 'Clases']
        ]);

        $this->set('horario', $horario);
        $this->set('_serialize', ['horario']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $horario = $this->Horarios->newEntity();
        if ($this->request->is('post')) {
            $horario = $this->Horarios->patchEntity($horario, $this->request->getData());
            $horario->num_dia = (date('N',strtotime($horario->nombre_dia)));
            if ($this->Horarios->save($horario)) {
                $this->Flash->success(__('The horario has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The horario could not be saved. Please, try again.'));
        }
        $dia = array("Lunes","Martes","Miércoles","Jueves","Viernes",'Sábado','Domingo');
        $days = array(
        		'Monday',
        		'Tuesday',
        		'Wednesday',
        		'Thursday',
        		'Friday',
        		'Saturday',
        		'Sunday'
        		);
        $dias = array_combine($days, $dia);
        $ciclolectivo = $this->Horarios->Ciclolectivo->find('list', ['limit' => 200]);
        $this->set(compact('horario', 'ciclolectivo','dias'));
        $this->set('_serialize', ['horario']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Horario id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $horario = $this->Horarios->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $horario = $this->Horarios->patchEntity($horario, $this->request->getData());
            $horario->num_dia = (date('N',strtotime($horario->nombre_dia)));
            if ($this->Horarios->save($horario)) {
                $this->Flash->success(__('The horario has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The horario could not be saved. Please, try again.'));
        }
        $dia = array("Lunes","Martes","Miercoles","Jueves","Viernes");
        $days = array(
        		'Monday',
        		'Tuesday',
        		'Wednesday',
        		'Thursday',
        		'Friday',
        );
        $dias = array_combine($days, $dia);
        $ciclolectivo = $this->Horarios->Ciclolectivo->find('list', ['limit' => 200]);
        $this->set(compact('horario', 'ciclolectivo','dias'));
        $this->set('_serialize', ['horario']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Horario id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $horario = $this->Horarios->get($id);
        if ($this->Horarios->delete($horario)) {
            $this->Flash->success(__('The horario has been deleted.'));
        } else {
            $this->Flash->error(__('The horario could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
