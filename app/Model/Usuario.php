<?php 
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');
class Usuario extends AppModel{
	
   public $useTable = 'usuario';
   
  /* public function beforeSave($options = array()) {
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
         debug(AuthComponent::password($this->data[$this->alias]['pas‌​sword']))
        // Hash password
        if (isset($this->data[$this->alias]['contraseña'])) {
            $passwordHasher = new SimplePasswordHasher();
            $this->data[$this->alias]['contraseña'] = $passwordHasher->hash(
                $this->data[$this->alias]['contraseña']
            );
        }

        return true;
    }
*/
 
}
