<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PagosAlumnos Model
 *
 * @property \App\Model\Table\AlumnosTable|\Cake\ORM\Association\BelongsTo $Alumnos
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\PagosAlumno get($primaryKey, $options = [])
 * @method \App\Model\Entity\PagosAlumno newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PagosAlumno[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PagosAlumno|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PagosAlumno patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PagosAlumno[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PagosAlumno findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PagosAlumnosTable extends Table
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

        $this->setTable('pagos_alumnos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Alumnos', [
            'foreignKey' => 'alumno_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id'
        ]);
        
        $this->hasMany('PagosConceptos', [
        		'foreignKey' => 'pago_alumno_id'
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
            ->allowEmpty('mes');

        $validator
            ->decimal('monto')
            ->allowEmpty('monto');

        $validator
            ->boolean('pagado')
            ->requirePresence('pagado', 'create')
            ->notEmpty('pagado');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
    public function findOrdered(Query $query, array $options)
    {
    	return $query
    	->order([
    			'Alumnos.apellido' => 'asc',
    			'Alumnos.nombre' => 'asc'
    	]);
    }
    
}
