<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');
App::uses('CakeEmail', 'Network/Email');
/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */


App::uses('CakeEmail', 'Network/Email');

class AppController extends Controller
{   

     public $components = array(
        'RequestHandler',
        'Paginator',
        'Session',
        'Auth' => array(
            'authenticate' => array(
                'Form' => array(
                    'passwordHasher' => 'Blowfish',
                    'userModel' => 'User',
                    'fields' => array(
                        'username' => 'username',
                        'password' => 'password'
                    )
                )
            ) ,
            'loginAction' => array(
                "controller" => "Pages",
                "action" => "display"
            ) ,
            'logoutRedirect' => array(
                'controller' => 'Pages',
                'action' => 'display'
            )
        )
    );

  

    public function beforeFilter() {
        $this->Auth->allow();;
        $this->set('loggedIn', $this->Auth->loggedIn());
        $this->set('user', $this->Auth->user());
       
    }




    public $helpers = array(
        'Html',
        'Form',
        'Session',
        'Paginator'
    );
    
    public static function newAccessToken() {
        return md5(uniqid(mt_rand() , true));
    }
    
    
    public function defaultLimit() {
        return 10;
    }


}



