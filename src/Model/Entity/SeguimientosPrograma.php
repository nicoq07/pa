<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SeguimientosPrograma Entity
 *
 * @property int $id
 * @property int $clase_alumno_id
 * @property string $observacion
 * @property bool $presente
 * @property \Cake\I18n\FrozenTime $fecha
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\ClasesAlumno $clases_alumno
 */
class SeguimientosPrograma extends Entity
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
}
