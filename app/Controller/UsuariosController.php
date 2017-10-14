<?php
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');
App::uses('Component', 'Controller');

class UsuariosController extends AppController {

      public function beforeFilter(){
      
      parent::beforeFilter();
 
      $model = $this->modelClass;
      $this->set('model',$model);

      $this->loadModel('Cvs');
      $this->loadModel('Usuariojr');
      $this->loadModel('Historico');
     }
  

     public function index(){
    
      $model = $this->modelClass;

      $this->Paginator->settings = array(
            'limit' => $this->defaultLimit() ,
            'order' => "$model.id ASC",
       );

       $data = $this->Paginator->paginate($model);

        $this->set('items', $data);

     }


     public function edit($id){
 
        $model = $this->modelClass;
        if ($this->request->is('post')) {
            
            $toSave = array(
              'id'     => $id,
              'email'  => $this->data['email'], 
              'contraseña'  => $this->data['contraseña'],
              'nombre'  => $this->data['nombre'],
              'apellido'  => $this->data['apellido'],
              'dni'  => $this->data['dni'], 
              'fk_tipo'  => $this->data['fk_tipo'],
            );
            
            $saved = $this->$model->save($toSave);

            if (!empty($saved)) {
                $this->Session->setFlash(Configure::read('m.flash/form_saved') , 'alert');
                return $this->redirect(array('action'=> 'index'));
            } 
            else {
                $this->Session->setFlash(Configure::read('m.flash/form_not_saved') , 'alert');
            }
        }
        $item = $this->$model->findById($id);
        $this->set('item', $item);
     }

   
     
      public function perfil($id){
 
        $model = $this->modelClass;
        if ($this->request->is('post')) {
            
            $toSave = array(
              'id'     => $id,
              'email'  => $this->data['email'], 
              'contraseña'  => $this->data['contraseña'],
              'nombre'  => $this->data['nombre'],
              'apellido'  => $this->data['apellido'],
              'dni'  => $this->data['dni'], 
              'fk_tipo'  => $this->data['fk_tipo'],
            );
            
            $saved = $this->$model->save($toSave);

            if (!empty($saved)) {
                $this->Session->setFlash(Configure::read('m.flash/form_saved') , 'alert');
                return $this->redirect(array('action'=> 'perfil/'.$id));
            } 
            else {
                $this->Session->setFlash(Configure::read('m.flash/form_not_saved') , 'alert');
            }
        }
        $item = $this->$model->findById($id);
        $this->set('item', $item);
     }



     public function delete($id){
        
        $model = $this->modelClass;
        
        $idusuariojr = $this->Usuariojr->find('all',array('fields'    =>"id",
                                                          'conditions'=>array('pk_usuario'=> $id))); 
        
        foreach ($idusuariojr as $idcvjr) { 
          $this->Cvs->delete($idcvjr["Usuariojr"]["id"]);
          $this->Historico->delete($idcvjr["Usuariojr"]["id"]);
        }

        $this->Usuariojr->deleteAll(array('pk_usuario'=> $id));
      
        $this->$model->delete($id);

       
        

        $this->$model->delete($id);
        $this->Session->setFlash(Configure::read('m.flash/form_saved') , 'alert-error');
        return $this->redirect(array(
            'action' => 'index'
        ));
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
          $tipo       = $post['fk_tipo']; 
        
          $passwordHasher = new BlowfishPasswordHasher();
          

          if(empty($usuario_v)){
            $guardar = $this->Usuario->save(array(
                        'email'      =>   $email,
                        'contraseña' =>   $passwordHasher->hash($contraseña),
                        'nombre'     =>   $nombre ,  
                        'apellido'   =>   $apellido , 
                        'id'         =>   $dni , 
                        'fk_tipo'    =>   $tipo  
                        ));   
           
            if(!empty($post['matricula'])) {   
            $matricula  = $post['matricula']; 

            $guardar = $this->UsuarioMedico->save(array(
                                'id'         =>   $dni , 
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
                        'Usuario.id' => $dni,
                    ),
                
                )); 

                if (!empty($user_data)) {
                    $hashedPassword = $user_data["Usuario"]['contraseña'];
                   
                    $convertedPass = Security::hash($contraseña, 'blowfish', $hashedPassword);
                  
                    if ($hashedPassword == $convertedPass) {
                       $user = $this->Auth->User();
                       $this->Session->setFlash('BIENVENIDO/A a TEGUIO,inclusion autismo', 'alert');
                        return $this->redirect(Router::url('/', true));
                    }else {
                       $this->Session->setFlash('Contraseña Invalida', 'alert-error');
                        return $this->redirect(Router::url('/', true));
                     
                    }
                }else {
                      $this->Session->setFlash('Usuario Invalido', 'alert-error');
                        return $this->redirect(Router::url('/', true));
                }
          } 
      }catch(Exception $ex){
        return $ex->getMessage();
      }
    }


}