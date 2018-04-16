<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Calificaciones Model
 *
 * @method \App\Model\Entity\Calificacione get($primaryKey, $options = [])
 * @method \App\Model\Entity\Calificacione newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Calificacione[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Calificacione|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Calificacione patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Calificacione[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Calificacione findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CalificacionesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('calificaciones');
        $this->setDisplayField('presentacion');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('nombre', 'create')
            ->notEmpty('nombre');

        $validator
            ->integer('valor')
            ->requirePresence('valor', 'create')
            ->notEmpty('valor');

        $validator
            ->integer('aprobado')
            ->requirePresence('aprobado', 'create')
            ->notEmpty('aprobado');

        return $validator;
    }
    public function findOrdered(Query $query, array $options)
    {
    	return $query
    	->order([
    			'Calificaciones.valor' => 'asc',
    	]);
    }
}
