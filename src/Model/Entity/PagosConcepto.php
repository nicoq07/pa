<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PagosConcepto Entity
 *
 * @property int $id
 * @property int $pago_alumno_id
 * @property int $cantidad
 * @property float $monto
 * @property string $detalle
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\PagosAlumno $pagos_alumno
 */
class PagosConcepto extends Entity
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
    
    public function _getDetalles()
    {
    	$detalles = $this->_properties['detalle'] . ' ' . $this->_properties['monto'];
    	return $detalles;
    }
}
