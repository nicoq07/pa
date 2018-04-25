<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Database\Connection;
use Cake\Datasource\ConnectionManager;
/**
 * Profesore Entity
 *
 * @property int $id
 * @property int $legajo_numero
 * @property string $apellido
 * @property string $nombre
 * @property string $nro_documento
 * @property string $direccion
 * @property string $ciudad
 * @property string $codigo_postal
 * @property string $email
 * @property string $cuit
 * @property string $telefono
 * @property string $celular
 * @property string $nombre_contacto
 * @property string $celular_contacto
 * @property string $titulo
 * @property string $observacion
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property bool $active
 * @property \Cake\I18n\FrozenTime $fecha_nacimiento
 */
class Profesore extends Entity
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
    	$nomyape = $this->_properties['nombre'] . ' ' . $this->_properties['apellido'];
    	return $nomyape;
    }
    
    public function workingDays($mes)
    {
    	$id = $this->_properties['id'];
    	$query = "SELECT DISTINCT DATE_FORMAT(s.fecha, '%d') as fecha, c.id as id, h.nombre_dia
				FROM
				seguimientos_clases_alumnos as s,
				horarios as h,
				clases_alumnos as ca,
				clases as c,
				profesores as p
				WHERE
				p.id = $id AND
				MONTH(s.fecha) = $mes AND
				s.clase_alumno_id = ca.id AND
				ca.clase_id = c.id AND
				c.profesor_id = p.id AND
				c.horario_id = h.id AND
                s.fue_transferida = 0
				GROUP BY fecha
				order by(s.fecha)
				";
    	
//     	echo $query;
    	$connection = ConnectionManager::get('default');
    	$dias = $connection->execute($query);
    	$r = array();
    	foreach ($dias as $dia)
    	{
    		array_push($r, [$dia['nombre_dia'] => $dia['fecha']]);
    	}
    	
    	
    	return $r;
    }
}
