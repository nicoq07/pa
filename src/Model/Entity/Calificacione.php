<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Calificacione Entity
 *
 * @property int $id
 * @property string $nombre
 * @property int $valor
 * @property int $aprobado
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 */
class Calificacione extends Entity
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
    	return $this->nombre . " ($this->valor)";
    }
    
    
}
