<?php
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');
App::uses('Component', 'Controller');

class UsersController extends AppController {

     public function beforeFilter(){
      
      parent::beforeFilter();
      $model = $this->modelClass;
      $this->set('model',$model);
     
     }
  

    

    public function register() {

    $this->autoRender = false;
    
   
    $this->loadModel('Usuario');
    $this->loadModel('UsuarioMedico');
   
     if ($this->request->data) {
        $post = $this->request->data;
          $email      = $post['email'];
          $contraseña = $post['contraseña'];  
          $nombre     = $post['nombre'];    
          $apellido   = $post['apellido'];
          $dni        = $post['dni']; 
          $tipo       = $post['tipo']; 
        
          $passwordHasher = new BlowfishPasswordHasher();
          

          if(empty($usuario_v)){
            $guardar = $this->Usuario->save(array(
                        'email'      =>   $email,
                        'contraseña' =>   $passwordHasher->hash($contraseña),
                        'nombre'     =>   $nombre ,  
                        'apellido'   =>   $apellido , 
                        'id_dni'     =>   $dni , 
                        'fk_tipo'    =>   $tipo  
                        ));   
           
            if(!empty($post['matricula'])) {   
            $matricula  = $post['matricula']; 

            $guardar = $this->UsuarioMedico->save(array(
                                'id_dni'     =>   $dni , 
                                'matricula'  =>   $matricula
                             ));
            }

            if (!empty($guardar)) {
                $this->Session->setFlash('REGISTRO EXITOSO en TEGUIO,inclusion autismo', 'alert');
                return $this->redirect(array('action'=> 'index'));
            }

           }else{
                $this->Session->setFlash(Configure::read('m.flash/form_not_saved') , 'alert');
            
           } 
        }   
       
    }



    public function login() {
      $this->autoRender = false;     
      $this->loadModel('Usuario');
      try{
          if ($this->request->is('post') ) {
          
                $data = $this->request->data;
                $contraseña = $data['contraseña'];
                $dni = $data['dni'];
                $user_data = $this->Usuario->find('first', array(
                    'conditions' => array(
                        'Usuario.id_dni' => $dni,
                    ),
                
                )); 

                if (!empty($user_data)) {
                    $hashedPassword = $user_data["Usuario"]['contraseña'];
                   
                    $convertedPass = Security::hash($contraseña, 'blowfish', $hashedPassword);
                  
                    if ($hashedPassword == $convertedPass) {
                       $user = $this->Auth->User();
                       $this->Session->setFlash('BIENVENIDO/A a TEGUIO,inclusion autismo', 'alert');
                        return $this->redirect(Router::url('/Preguntas', true));
                    }else {
                       $this->Session->setFlash('Contraseña Invalida', 'alert-error');
                        return $this->redirect(Router::url('/Preguntas', true));
                     
                    }
                }else {
                      $this->Session->setFlash('Usuario Invalido', 'alert-error');
                        return $this->redirect(Router::url('/Preguntas', true));
                }
          } 
      }catch(Exception $ex){
        return $ex->getMessage();
      }
    }


}