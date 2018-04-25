<?php
namespace App\Controller;

use Cake\Datasource\ConnectionManager;

/**
 * Operadores Controller
 *
 * @property \App\Model\Table\OperadoresTable $Operadores
 *
 * @method \App\Model\Entity\Operadore[] paginate($object = null, array $settings = [])
 */
class OperadoresController extends AppController
{
    public function isAuthorized($user)
    {
        if(isset($user['rol_id']) &&  $user['rol_id'] === OPERADOR)
        {
            if(in_array($this->request->action, ['planillaCursos','planillaCursosPdf','prepararListado','gruopBy']))
            {
                return true;
            }
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
    public function planillaCursos($id = null)
    {
        $where = null;
        $selected = ['empty' => "Seleccione operador..."];
        if (!empty($id))
        {
            $where= ['Operadores.id' => $id];
            $selected = ['selected' => 1];
        }
        $operadores = $this->Operadores
        ->find('list')
        ->where(['Operadores.active ' => true,$where])
        ->matching('Clases.Horarios.Ciclolectivo', function ($q) {
            return $q->where(['YEAR(fecha_inicio)' => date('Y')]);
        });
            if ($this->request->is(['post']))
            {
                
                if(empty($this->request->getData('operador_id')) )
                {
                    $this->Flash->error("Debe seleccionar un operador");
                    $this->redirect($this->referer());
                }
                $id = $this->request->getData('operador_id');
                $mes = $this->request->getData('mes')['month'];
                
                return  $this->redirect(['action' => 'planilla_cursos_pdf',$id,$mes,'_ext' => 'pdf']);
                
            }
            
            $this->set(compact('operadores','selected'));
    }
    public function planillas()
    {
        
    }
    public function planillaCursosPdf($id, $mes)
    {
        $connection = ConnectionManager::get('default');
        $operador = $this->Operadores->get($id);
        $idoperador = $operador->id;
        
        $qClases = "select test.* from
        (select ca.id  as clasealumno_id,  CONCAT_WS(' ',a.apellido ,a.nombre) as alumno, h.nombre_dia as nom_dia, a.id as alumno_id,
    	h.hora as hora , c.id clase_id, h.num_dia as dia , d.descripcion as disci ,CONCAT_WS(' ',p.apellido ,p.nombre) as profesor
    	from  horarios as h, seguimientos_programa as s, operadores as o, alumnos as a, clases as c, clases_alumnos as ca
    	, disciplinas as d , ciclolectivo as ciclo, profesores as p
    	WHERE
    	h.id = c.horario_id AND
    	c.id = ca.clase_id AND
    	c.disciplina_id = d.id AND
    	o.id = $idoperador AND
    	c.operador_id = o.id AND
        c.profesor_id = p.id AND
    	ca.alumno_id = a.id AND
    	ca.id = s.clase_alumno_id AND
    	ciclo.id = h.ciclolectivo_id AND
        s.fue_transferida = 0 AND
    	MONTH(s.fecha) = $mes AND
    	YEAR(ciclo.fecha_inicio) = YEAR(CURDATE())
        UNION
        select '', '-SIN ALUMNOS-', h.nombre_dia as nom_dia,'', h.hora as hora , c.id clase_id, h.num_dia as dia , d.descripcion as disci,CONCAT_WS(' ',p.apellido ,p.nombre) as profesor
        from horarios as h, operadores as o, clases as c , disciplinas as d , ciclolectivo as ciclo, profesores as p
        WHERE h.id = c.horario_id AND
        c.id NOT IN (SELECT clase_id from clases_alumnos) AND
        c.disciplina_id = d.id AND
        o.id = $idoperador AND
        c.profesor_id = p.id AND
        c.operador_id = o.id AND
         ciclo.id = h.ciclolectivo_id AND
         YEAR(ciclo.fecha_inicio) = YEAR(CURDATE())) as test
       GROUP by test.clasealumno_id, test.nom_dia , test.hora
        ORDER BY test.dia, test.hora, test.alumno";
        
        $rClases = $connection->execute($qClases);
        
        $qPresentes = "SELECT ca.id as ca, DATE_FORMAT(s.fecha, '%d') as fecha, s.presente, a.id as alumno_id, s.created as creada, s.modified as modificada, c.id as clase_id
    	from  horarios as h, seguimientos_programa as s, operadores as p, alumnos as a, clases as c, clases_alumnos as ca
    	, disciplinas as d, ciclolectivo as ciclo
    	WHERE
    	h.id = c.horario_id AND
    	c.id = ca.clase_id AND
    	c.disciplina_id = d.id AND
    	p.id = $idoperador AND
    	c.operador_id = p.id AND
    	ca.alumno_id = a.id AND
    	ca.id = s.clase_alumno_id AND
    	ciclo.id = h.ciclolectivo_id AND
        s.fue_transferida = 0 AND
    	MONTH(s.fecha) = $mes AND
    	YEAR(ciclo.fecha_inicio) = YEAR(CURDATE())
    	ORDER BY  alumno_id, fecha";
        
        
        $rPresentes= $connection->execute($qPresentes);
        $arrayPresentes = $this->groupBy($rPresentes, 'ca');
        
        //  		debug($arrayPresentes); exit;
        
        $qClases = "SELECT * FROM view_a_clases as v WHERE v.operador_id = $idoperador
    	ORDER BY dia,hora";
        
        $clasesD = $connection->execute($qClases);
        
        
        
        $arrayClases = $this->groupBy($rClases, 'nom_dia');
        
        
        $dias = $operador->workingDays($mes);
        if(empty($dias))
        {
            $this->Flash->error("Este mes el operador no tuvo trabajo");
            return $this->redirect($this->referer());
        }
        $mes = __(date("F", strtotime(date('Y')."-$mes-01")));
        
        
        $this->prepararListado($mes, $operador->presentacion, 'A4', 'portrait');
        $this->set(compact('clasesD','operador','dias','arrayClases','mes','arrayPresentes'));
        
    }
    private function prepararListado($mes,$operador,$tipoHoja,$orientacion)
    {
        $this->viewBuilder()->setOptions([
            'pdfConfig' => [
                'margin' => [
                    'bottom' => 15,
                    'left' => 20,
                    'right' => 0,
                    'top' => 9
                ],
                'pageSize' => $tipoHoja,
                'orientation' => $orientacion,
                'filename' => "Listado de".$operador.' del mes'.$mes.'.pdf'
            ]
        ]);
    }
    function groupBy($array, $key) {
        $return = array();
        foreach($array as $val) {
            $return[$val[$key]][] = $val;
        }
        return $return;
    }
}
