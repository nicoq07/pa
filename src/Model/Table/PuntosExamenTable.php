<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PuntosExamen Model
 *
 * @property \App\Model\Table\ExamenesTable|\Cake\ORM\Association\BelongsTo $Examenes
 * @property \App\Model\Table\CalificacionesTable|\Cake\ORM\Association\BelongsTo $Calificaciones
 *
 * @method \App\Model\Entity\PuntosExaman get($primaryKey, $options = [])
 * @method \App\Model\Entity\PuntosExaman newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PuntosExaman[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PuntosExaman|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PuntosExaman patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PuntosExaman[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PuntosExaman findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PuntosExamenTable extends Table
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

        $this->setTable('puntos_examen');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Examenes', [
            'foreignKey' => 'examen_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Calificaciones', [
            'foreignKey' => 'calificacion_id'
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
            ->requirePresence('descripcion', 'create')
            ->notEmpty('descripcion');

        $validator
            ->integer('nota')
            ->allowEmpty('nota');

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
        $rules->add($rules->existsIn(['examen_id'], 'Examenes'));
        $rules->add($rules->existsIn(['calificacion_id'], 'Calificaciones'));

        return $rules;
    }
}
