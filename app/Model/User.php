<?php
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');

class User extends AppModel {

	public $useTable = 'usuario';
    public function beforeSave($options = array()) {
        // Remove password
        if (empty($this->data[$this->alias]['contraseña'])) {
            unset($this->data[$this->alias]['contraseña']);
        }

        // Check if user exists
    	if (empty($this->data[$this->alias]['id']) && isset($this->data[$this->alias]['dni'])) {
    		$user = $this->findId($this->data[$this->alias]['id']);
    		if (!empty($user)) {
    			return false;
    		}
    	}
        
        // Hash password
        if (isset($this->data[$this->alias]['contraseña'])) {
            $passwordHasher = new SimplePasswordHasher();
            $this->data[$this->alias]['contraseña'] = $passwordHasher->hash(
                $this->data[$this->alias]['contraseña']
            );
        }

        // Transform birthday to datetime format
        if (isset($this->data[$this->alias]['birthday'])) {
        	$date = explode('/', $this->data[$this->alias]['birthday']);
        	$date = implode('-', array($date[2], $date[1], $date[0]));
        	$this->data[$this->alias]['birthday'] = $date;
        }

        return true;
    }


    public $validate = array(
    	'email' => array(
    		'required' => array(
    			'rule' => 'notBlank',
    			'required' => true,
    			'allowEmpty' => false,
    			'message' => 'El campo email es requerido'
			)
		),
		'password' => array(
			'required' => array(
				'rule' => 'notBlank',
				'required' => false,
				'allowEmpty' => true,
				'message'  => 'La campo password es requerido'
			)
		),
		'name' => array(
			'required' => array(
				'rule' => 'notBlank',
				'required' => true,
				'allowEmpty' => false,
				'message'  => 'El campo nombre es requerido'
			)
		),
		'surname' => array(
			'required' => array(
				'rule' => 'notBlank',
				'required' => true,
				'allowEmpty' => false,
				'message'  => 'La campo apellido es requerido'
			)
		)
	);
*/

public $validate = array(
    	'email' => array(
    		'required' => array(
    			'rule' => 'notBlank',
    			'required' => true,
    			'allowEmpty' => false,
    			'message' => 'El campo email es requerido'
			)
		),
		'password' => array(
			'required' => array(
				'rule' => 'notBlank',
				'required' => false,
				'allowEmpty' => true,
				'message'  => 'La campo password es requerido'
			)
		),
		'name' => array(
			'required' => array(
				'rule' => 'notBlank',
				'required' => true,
				'allowEmpty' => false,
				'message'  => 'El campo nombre es requerido'
			)
		),
		'surname' => array(
			'required' => array(
				'rule' => 'notBlank',
				'required' => true,
				'allowEmpty' => false,
				'message'  => 'La campo apellido es requerido'
			)
		)
	);
}
