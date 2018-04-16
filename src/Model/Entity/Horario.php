<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\I18n\Time;

/**
 * Horario Entity
 *
 * @property int $id
 * @property int $ciclolectivo_id
 * @property string $nombre_dia
 * @property \Cake\I18n\FrozenTime $hora
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property bool $active
 *
 * @property \App\Model\Entity\Ciclolectivo $ciclolectivo
 * @property \App\Model\Entity\Clase[] $clases
 */
class Horario extends Entity
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
    	
    	$hora = new Time($this->_properties['hora']);
    	$nomyape = __($this->_properties['nombre_dia']) . ' ' .$hora->format('H:i');
    	return $nomyape;
    }
}
