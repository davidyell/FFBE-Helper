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

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('Auth', [
            'authenticate' => [
                'Form' => [
                    'fields' => ['username' => 'email', 'password' => 'password']
                ]
            ],
            'authError' => __('You must login to access that page.'),
            'authorize' => 'Controller',
            'flash' => ['element' => 'default'],
            'loginAction' => ['controller' => 'Users', 'action' => 'login', 'prefix' => false],
            'loginRedirect' => '/',
            'logoutRedirect' => '/'
        ]);
    }

    /**
     * beforeFilter callback
     *
     * @param \Cake\Event\Event $event Event instance
     *
     * @return void
     */
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);

        if (!empty($this->request->getParam('prefix')) && $this->request->getParam('prefix') === 'admin') {
            $this->viewBuilder()->setLayout('admin');

            $this->Auth->deny();
        }
    }

    /**
     * Check that users are allowed to do things
     *
     * @param array|null $user The currently logged in users details
     *
     * @return bool
     */
    public function isAuthorized($user = null): bool
    {
        if (!empty($this->request->getParam('prefix')) && $this->request->getParam('prefix') === 'admin' && isset($user['role']) && $user['role'] === 'admin') {
            return true;
        }

        if (empty($this->request->getParam('prefix'))) {
            return true;
        }

        return false;
    }
}
