<?php
namespace App\Model\Table;

use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\Query;

/**
 * Profesores Model
 *
 * @method \App\Model\Entity\Profesore get($primaryKey, $options = [])
 * @method \App\Model\Entity\Profesore newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Profesore[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Profesore|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Profesore patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Profesore[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Profesore findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ProfesoresTable extends Table
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

        $this->setTable('profesores');
        $this->setDisplayField('presentacion');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        
        $this->hasMany('Clases', [
        		'foreignKey' => 'profesor_id'
        ]);
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
            ->integer('legajo_numero')
            ->allowEmpty('legajo_numero');

        $validator
            ->requirePresence('apellido', 'create')
            ->notEmpty('apellido');

        $validator
            ->requirePresence('nombre', 'create')
            ->notEmpty('nombre');

//         $validator
//             ->requirePresence('nro_documento', 'create')
//             ->notEmpty('nro_documento');

        $validator
            ->allowEmpty('direccion');

        $validator
            ->allowEmpty('ciudad');

        $validator
            ->allowEmpty('codigo_postal');

//         $validator
//             ->email('email')
//             ->allowEmpty('email');

//         $validator
//             ->requirePresence('cuit', 'create')
//             ->notEmpty('cuit');

        $validator
            ->allowEmpty('telefono');

        $validator
            ->allowEmpty('celular');

//         $validator
//             ->requirePresence('nombre_contacto', 'create')
//             ->notEmpty('nombre_contacto');

        $validator
            ->allowEmpty('celular_contacto');

        $validator
            ->allowEmpty('titulo');

        $validator
            ->allowEmpty('observacion');

        $validator
            ->boolean('active')
            ->requirePresence('active', 'create')
            ->notEmpty('active');

        $validator
            ->date('fecha_nacimiento')
            ->allowEmpty('fecha_nacimiento');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
//     public function buildRules(RulesChecker $rules)
//     {
//         $rules->add($rules->isUnique(['email']));

//         return $rules;
//     }

    
    public function findOrdered(Query $query, array $options)
    {
    	return $query
    	->order([
				'Profesores.nombre' => 'asc',
    			'Profesores.apellido' => 'asc',
    			
    	]);
    }
    
}
