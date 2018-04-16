<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PagosConceptos Model
 *
 * @property \App\Model\Table\PagosAlumnosTable|\Cake\ORM\Association\BelongsTo $PagosAlumnos
 *
 * @method \App\Model\Entity\PagosConcepto get($primaryKey, $options = [])
 * @method \App\Model\Entity\PagosConcepto newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PagosConcepto[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PagosConcepto|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PagosConcepto patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PagosConcepto[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PagosConcepto findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PagosConceptosTable extends Table
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

        $this->setTable('pagos_conceptos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('PagosAlumnos', [
            'foreignKey' => 'pago_alumno_id',
            'joinType' => 'INNER'
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
            ->integer('cantidad')
            ->requirePresence('cantidad', 'create')
            ->notEmpty('cantidad');

        $validator
            ->decimal('monto')
            ->allowEmpty('monto');

        $validator
            ->requirePresence('detalle', 'create')
            ->notEmpty('detalle');

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
        $rules->add($rules->existsIn(['pago_alumno_id'], 'PagosAlumnos'));

        return $rules;
    }
}
