<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property |\Cake\ORM\Association\BelongsTo $Profesores
 * @property \App\Model\Table\RolesTable|\Cake\ORM\Association\BelongsTo $Roles
 * @property \App\Model\Table\PagosAlumnosTable|\Cake\ORM\Association\HasMany $PagosAlumnos
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table
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

        $this->setTable('users');
        $this->setDisplayField('presentacion');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Profesores', [
            'foreignKey' => 'profesor_id'
        ]);
        $this->belongsTo('Operadores', [
        		'foreignKey' => 'operador_id'
        ]);
        $this->belongsTo('Roles', [
            'foreignKey' => 'rol_id'
        ]);
        $this->hasMany('PagosAlumnos', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Notificaciones', [
        		'foreignKey' => 'receptor'
        ]);
        $this->hasMany('Notificaciones', [
        		'foreignKey' => 'emisor'
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
            ->requirePresence('nombre_usuario', 'create')
            ->notEmpty('nombre_usuario');

        $validator
            ->requirePresence('password', 'create')
            ->notEmpty('password');

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
        $rules->add($rules->existsIn(['profesor_id'], 'Profesores'));
        $rules->add($rules->existsIn(['operador_id'], 'Operadores'));
        $rules->add($rules->existsIn(['rol_id'], 'Roles'));

        return $rules;
    }
    
    
    public function recoverPassword($id)
    {
    	$user = $this->get($id);
    	return $user->password;
    }
    
    public function findAuth(\Cake\ORM\Query $query, array $options)
    {
    	$query
    	->select(['id','nombre','apellido', 'nombre_usuario', 'password', 'rol_id','profesor_id','fondo','operador_id'])
    	->where(['Users.active' => 1]);
    	return $query;
    }
    
}
