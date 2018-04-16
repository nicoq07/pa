<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
	
    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();
        
        $this->loadComponent('RequestHandler',[
        				'viewClassMap' => [
        						'xlsx' => 'CakeExcel.Excel',
        				],
        ]);
        $this->loadComponent('Flash');
        $this->loadComponent('Auth', [
        		'authorize' => ['Controller'],
        		'authenticate' => [
        				'Form' => [
        						'fields' => [
        								'username' => 'nombre_usuario',
        								'password' => 'password'
        						],
        						'finder' => 'auth'
        				]
        		],
        		'loginAction' => [ // donde esta el login
        				'controller' => 'Users',
        				'action' => 'login'
        		],
        		'authError' => 'Ups, no tenés permisos para entrar ahí',
        		
        		'loginRedirect' => [ //que pasa despues del login
        				'controller' => 'Users',
        				'action' => 'home'
        		],
        		'logoutRedirect' => [ //que pasa despues del logout
        				'controller' => 'Users',
        				'action' => 'login'
        		],
        		'unauthorizedRedirect' => $this->referer()
        ]);
		if(TableRegistry::get('Notificaciones')->userNotificaciones($this->Auth->user('id')) > 0)
		{
			$this->set('not',true);
		}
		if(TableRegistry::get('GestorTareas')->hayTareas() > 0)
		{
			$this->set('task',true);
		}
        /*
         * Enable the following components for recommended CakePHP security settings.
         * see http://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');
        //$this->loadComponent('Csrf');
    }

    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return \Cake\Network\Response|null|void
     */
    public function beforeRender(Event $event)
    {
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
    }
    
    public function beforeFilter(Event $event)
    {
    	$this->set('current_user', $this->Auth->user());
    	
    }
    
    public function isAuthorized($user)
    {
    	if(isset($user['rol_id']) and $user['rol_id'] === ADMINISTRADOR)
    	{
    		return true;
    	}
    	return false;
    }
}
