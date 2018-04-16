<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Examenes Model
 *
 * @property \App\Model\Table\ClasesAlumnosTable|\Cake\ORM\Association\BelongsTo $ClasesAlumnos
 *
 * @method \App\Model\Entity\Examene get($primaryKey, $options = [])
 * @method \App\Model\Entity\Examene newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Examene[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Examene|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Examene patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Examene[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Examene findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ExamenesTable extends Table
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

        $this->setTable('examenes');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('ClasesAlumnos', [
            'foreignKey' => 'clase_alumno_id'
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
            ->allowEmpty('periodo');

        $validator
            ->integer('aprobado')
            ->requirePresence('aprobado', 'create')
            ->notEmpty('aprobado');

        $validator
            ->allowEmpty('calificacion');

        $validator
            ->allowEmpty('audioperceptiva');

        $validator
            ->allowEmpty('practica_ensamble');

        $validator
            ->allowEmpty('trabajos_practicos');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['clase_alumno_id'], 'ClasesAlumnos'));

        return $rules;
    }
    
    public function findOrdered(Query $query, array $options)
    {
    	return $query
    	->order([
    			'Alumnos.apellido' => 'asc',
    			'Alumnos.nombre' => 'asc',
    			
    	]);
    }
}
