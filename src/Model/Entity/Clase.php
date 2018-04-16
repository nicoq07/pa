<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;

/**
 * Clase Entity
 *
 * @property int $id
 * @property int $profesor_id
 * @property int $operador_id
 * @property int $horario_id
 * @property int $disciplina_id
 * @property bool $programa_adolescencia
 * @property int $alumno_count
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property bool $active
 *
 * @property \App\Model\Entity\Profesore $profesore
 * @property \App\Model\Entity\Horario $horario
 * @property \App\Model\Entity\Disciplina $disciplina
 * @property \App\Model\Entity\SeguimientosClase[] $seguimientos_clases
 * @property \App\Model\Entity\Alumno[] $alumnos
 */
class Clase extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
    
    public function _getPresentacion()
    {
    	$disciplinas = TableRegistry::get('Disciplinas');
    	$disciplina = $disciplinas->get($this->disciplina_id);
    	
    	$profesores = TableRegistry::get('Profesores');
    	$profe = $profesores->get($this->profesor_id);
    	
    	$horarios = TableRegistry::get('Horarios');
    	$horario = $horarios->get($this->horario_id);
    	
    	$cadena = strtoupper($disciplina->descripcion) . ", " . $horario->presentacion. " con " . $profe->presentacion;
    	
    	return $cadena;
    }
    
    public function _getPresentacionCorta()
    {
    	$disciplinas = TableRegistry::get('Disciplinas');
    	$disciplina = $disciplinas->get($this->disciplina_id);
    	
    	$horarios = TableRegistry::get('Horarios');
    	$horario = $horarios->get($this->horario_id);
    	
    	$cadena = strtoupper($disciplina->descripcion) . ", " . $horario->presentacion;
    	
    	return $cadena;
    }
    
    public function _getPresentacionDisciplina()
    {
    	$disciplinas = TableRegistry::get('Disciplinas');
    	$disciplina = $disciplinas->get($this->disciplina_id);
    	$cadena = strtoupper($disciplina->descripcion);
    	
    	return $cadena;
    }
    
    
}
