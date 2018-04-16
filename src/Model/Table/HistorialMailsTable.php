<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * HistorialMails Model
 *
 * @method \App\Model\Entity\HistorialMail get($primaryKey, $options = [])
 * @method \App\Model\Entity\HistorialMail newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\HistorialMail[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\HistorialMail|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\HistorialMail patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\HistorialMail[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\HistorialMail findOrCreate($search, callable $callback = null, $options = [])
 */
class HistorialMailsTable extends Table
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

        $this->setTable('historial_mails');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
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
            ->date('dia')
            ->allowEmpty('dia');

        $validator
            ->boolean('enviado')
            ->allowEmpty('enviado');

        $validator
            ->integer('cantidad')
            ->allowEmpty('cantidad');

        return $validator;
    }
}
