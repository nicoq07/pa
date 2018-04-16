<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Notificacione Entity
 *
 * @property int $id
 * @property string $descripcion
 * @property int $emisor
 * @property int $receptor
 * @property bool $leida
 * @property bool $broadcast
 * @property \Cake\I18n\FrozenTime $created
 */
class Notificacione extends Entity
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
