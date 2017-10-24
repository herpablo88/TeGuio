<?php
App::uses('AppModel', 'Model');
App::uses('BlowfishPasswordHa', 'Controller/Component/Auth');

class User extends AppModel {


 public $validate = array(
        'dni' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'A dni is required'
            )
        ),
        'password' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'A password is required'
            )
        ),
      /*  'role' => array(
            'valid' => array(
                'rule' => array('inList', array('admin', 'author')),
                'message' => 'Please enter a valid role',
                'allowEmpty' => false
            )
        )*/
    );



}
