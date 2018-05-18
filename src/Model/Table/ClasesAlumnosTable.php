<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ClasesAlumnos Model
 *
 * @property \App\Model\Table\AlumnosTable|\Cake\ORM\Association\BelongsTo $Alumnos
 * @property \App\Model\Table\ClasesTable|\Cake\ORM\Association\BelongsTo $Clases
 *
 * @method \App\Model\Entity\ClasesAlumno get($primaryKey, $options = [])
 * @method \App\Model\Entity\ClasesAlumno newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ClasesAlumno[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ClasesAlumno|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ClasesAlumno patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ClasesAlumno[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ClasesAlumno findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ClasesAlumnosTable extends Table
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

        $this->setTable('clases_alumnos');
        $this->setDisplayField('mostrarAlumno');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Alumnos', [
            'foreignKey' => 'alumno_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Clases', [
            'foreignKey' => 'clase_id',
            'joinType' => 'INNER'
        ]);
        
        $this->hasMany('SeguimientosPrograma', [
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
            ->boolean('active')
            ->requirePresence('active', 'create')
            ->notEmpty('active');

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
        $rules->add($rules->existsIn(['alumno_id'], 'Alumnos'));
        $rules->add($rules->existsIn(['clase_id'], 'Clases'));

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
