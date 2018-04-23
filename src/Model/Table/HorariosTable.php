<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Horarios Model
 *
 * @property \App\Model\Table\CiclolectivoTable|\Cake\ORM\Association\BelongsTo $Ciclolectivo
 * @property \App\Model\Table\ClasesTable|\Cake\ORM\Association\HasMany $Clases
 *
 * @method \App\Model\Entity\Horario get($primaryKey, $options = [])
 * @method \App\Model\Entity\Horario newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Horario[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Horario|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Horario patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Horario[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Horario findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class HorariosTable extends Table
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

        $this->setTable('horarios');
        $this->setDisplayField('presentacion');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Ciclolectivo', [
            'foreignKey' => 'ciclolectivo_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Clases', [
            'foreignKey' => 'horario_id'
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
            ->requirePresence('nombre_dia', 'create')
            ->notEmpty('nombre_dia');

        $validator
            ->time('hora')
            ->requirePresence('hora', 'create')
            ->notEmpty('hora');

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
        $rules->add($rules->existsIn(['ciclolectivo_id'], 'Ciclolectivo'));
        $rules->add($rules->isUnique(['hora','ciclolectivo_id','nombre_dia','num_dia'] ,'Ya existe ese horario cargado'));
        
        return $rules;
    }
    
    public function findOrdered(Query $query, array $options)
    {
        return $query
        ->order([
            'Horarios.num_dia' => 'asc',
            'Horarios.hora' => 'asc'
        ]);
    }
    public function findCurrentYear(Query $query, array $options)
    {
        return $query
        ->where([
            'YEAR(Ciclolectivo.fecha_inicio)' => date('Y'),
        ]);
    }
}
