<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PagosAlumno Entity
 *
 * @property int $id
 * @property int $alumno_id
 * @property string $mes
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property float $monto
 * @property bool $pagado
 * @property int $user_id
 *
 * @property \App\Model\Entity\Alumno $alumno
 * @property \App\Model\Entity\User $user
 */
class PagosAlumno extends Entity
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
