<?php 
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');
class Usuario extends AppModel{
	
   public $useTable = 'usuario';
   
   
  public function beforeSave($options = array()) {  
    if (isset($this->data[$this->alias]['password'])) {
        $passwordHasher = new BlowfishPasswordHasher();
        $this->data[$this->alias]['password'] = $passwordHasher->hash(
            $this->data[$this->alias]['password']
        );
    }
    return true;
}

 
}
