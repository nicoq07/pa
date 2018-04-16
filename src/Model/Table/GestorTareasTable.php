<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * GestorTareas Model
 *
 * @property \App\Model\Table\GestorTareasPrioridadTable|\Cake\ORM\Association\BelongsTo $GestorTareasPrioridad
 *
 * @method \App\Model\Entity\GestorTarea get($primaryKey, $options = [])
 * @method \App\Model\Entity\GestorTarea newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\GestorTarea[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\GestorTarea|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\GestorTarea patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\GestorTarea[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\GestorTarea findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class GestorTareasTable extends Table
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

        $this->setTable('gestor_tareas');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('GestorTareasPrioridad', [
            'foreignKey' => 'prioridad_id'
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
            ->allowEmpty('titulo');

        $validator
            ->requirePresence('descripcion', 'create')
            ->notEmpty('descripcion');

        $validator
            ->date('fecha_vencimiento')
            ->allowEmpty('fecha_vencimiento');

        $validator
            ->integer('resuelta')
            ->allowEmpty('resuelta');

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
        $rules->add($rules->existsIn(['prioridad_id'], 'GestorTareasPrioridad'));

        return $rules;
    }
    public function findOrdered(Query $query, array $options)
    {
    	return $query
    	->order([
    			'GestorTareasPrioridad.valor' => 'asc',
    			'GestorTareas.created' => 'desc',
    			
    	]);
    }
    
    public function hayTareas()
    {
    	$hay = $this->find()->where(['resuelta' => false])->count();
    	if ($hay)
    	{
    		return true;
    	}
    	return false;
    }
}
