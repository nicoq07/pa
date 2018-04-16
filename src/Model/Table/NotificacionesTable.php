<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Notificaciones Model
 *
 * @method \App\Model\Entity\Notificacione get($primaryKey, $options = [])
 * @method \App\Model\Entity\Notificacione newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Notificacione[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Notificacione|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Notificacione patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Notificacione[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Notificacione findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class NotificacionesTable extends Table
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

        $this->setTable('notificaciones');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        $this->belongsTo('Users', [
        		'foreignKey' => 'emisor',
        ]);
        
        $this->belongsTo('Users', [
        		'foreignKey' => 'receptor',
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
            ->integer('emisor')
            ->requirePresence('emisor', 'create')
            ->notEmpty('emisor');

        $validator
            ->integer('receptor')
            ->requirePresence('receptor', 'create')
            ->notEmpty('receptor');

        $validator
            ->boolean('leida')
            ->requirePresence('leida', 'create')
            ->notEmpty('leida');

//         $validator
//             ->boolean('broadcast')
//             ->requirePresence('broadcast', 'create')
//             ->notEmpty('broadcast');

        return $validator;
    }
    
    public function userNotificaciones($userID)
    {
    	$tiene = $this->find()->where(['receptor' => $userID,'leida' => false])->count();
    	if ($tiene)
    	{
    		return true;
    	}
    	return false;
    }
    
    
}
