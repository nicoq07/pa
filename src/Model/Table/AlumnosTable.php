<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Alumnos Model
 *
 * @property \App\Model\Table\PagosAlumnosTable|\Cake\ORM\Association\HasMany $PagosAlumnos
 * @property \App\Model\Table\ClasesTable|\Cake\ORM\Association\BelongsToMany $Clases
 *
 * @method \App\Model\Entity\Alumno get($primaryKey, $options = [])
 * @method \App\Model\Entity\Alumno newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Alumno[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Alumno|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Alumno patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Alumno[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Alumno findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AlumnosTable extends Table
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

        $this->setTable('alumnos');
        $this->setDisplayField('presentacion');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('PagosAlumnos', [
            'foreignKey' => 'alumno_id',
        		'dependent' => true,
        		'cascadeCallbacks' => true,
        ]);
//         $this->hasMany('ClasesAlumnos', [
//         		'foreignKey' => 'alumno_id'
//         ]);
        $this->belongsToMany('Clases', [
            'foreignKey' => 'alumno_id',
            'targetForeignKey' => 'clase_id',
            'joinTable' => 'clases_alumnos'
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
            ->requirePresence('nombre', 'create')
            ->notEmpty('nombre');

        $validator
            ->requirePresence('apellido', 'create')
            ->notEmpty('apellido');

        $validator
            ->date('fecha_nacimiento')
            ->allowEmpty('fecha_nacimiento');

        $validator
            ->allowEmpty('direccion');

        $validator
            ->allowEmpty('ciudad');

        $validator
            ->allowEmpty('codigo_postal');

        $validator
            ->allowEmpty('telefono');

        $validator
            ->allowEmpty('celular');

        $validator
            ->allowEmpty('nro_documento');

        $validator
            ->email('email')
            ->allowEmpty('email');

        $validator
            ->allowEmpty('observacion');

        $validator
            ->boolean('programa_adolecencia')
            ->requirePresence('programa_adolecencia', 'create')
            ->notEmpty('programa_adolecencia');

        $validator
            ->allowEmpty('colegio');

        $validator
            ->allowEmpty('nombre_madre');

        $validator
            ->allowEmpty('nombre_padre');

        $validator
            ->allowEmpty('email_padre');

        $validator
            ->allowEmpty('email_madre');

        $validator
            ->allowEmpty('celular_padre');

        $validator
            ->allowEmpty('celular_madre');

        $validator
            ->decimal('monto_arancel')
            ->allowEmpty('monto_arancel');

        $validator
            ->decimal('monto_materiales')
            ->allowEmpty('monto_materiales');

        $validator
            ->boolean('futuro_alumno')
            ->requirePresence('futuro_alumno', 'create')
            ->notEmpty('futuro_alumno');

        $validator
            ->boolean('active')
            ->requirePresence('active', 'create')
            ->notEmpty('active');
        
        $validator
        	->allowEmpty('referencia_foto');

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
		$rules->add($rules->isUnique(['nro_documento']));

        return $rules;
    }
    
    public function findOrdered(Query $query, array $options)
    {
    	return $query
    	->order([
    			'Alumnos.apellido' => 'asc',
    			'Alumnos.nombre'=> 'asc'
    	]);
    }
}
