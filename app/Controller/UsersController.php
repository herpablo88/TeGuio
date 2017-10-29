<?php

App::uses('Component', 'Controller');
App::uses('AppController', 'Controller');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

class UsersController extends AppController {

   public function beforeFilter() {
    parent::beforeFilter();
    // Allow users to register and logout.
    $this->Auth->allow('login', 'logout','register');


    $model = $this->modelClass;
    $this->set('model',$model);

    $this->loadModel('Cvs');
    $this->loadModel('Usuariojr');
    $this->loadModel('Historico');
    $this->loadModel('Post');
    $this->loadModel('Tipos');
    $this->loadModel('RespuestasPost'); 
}
    public function login() {
             
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {   
                $user = $this->Auth->User();  
                $this->Session->setFlash(Configure::read('m.flash/success_login'), 'alert');
                return $this->redirect(Router::url('/foro', true));
            }
            $this->Session->setFlash(Configure::read('m.flash/invalid_login'), 'alert-error');
            return $this->redirect(Router::url('/', true));
        }
    }

    public function logout() {
        return $this->redirect($this->Auth->logout());
    }

   /* public function index() {
        $this->User->recursive = 0;
        $this->set('users', $this->paginate());
    }*/
   
    public function index(){
   
      $model = $this->modelClass;

      $this->Paginator->settings = array(
            'limit' => $this->defaultLimit() ,
            'order' => "$model.id ASC",
       );

       $data = $this->Paginator->paginate($model);

       $this->set('items', $data);

       $tipos = $this->Tipos->find('all');
       $this->set('tipos', $tipos);
     }


  /*  public function view($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->set('user', $this->User->findById($id));
    }
  

    public function edit($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(
                __('The user could not be saved. Please, try again.')
            );
        } else {
            $this->request->data = $this->User->findById($id);
            unset($this->request->data['User']['password']);
        }
    }

    public function delete($id = null) {
        // Prior to 2.5 use
        // $this->request->onlyAllow('post');

        $this->request->allowMethod('post');

        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->User->delete()) {
            $this->Session->setFlash(__('User deleted'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('User was not deleted'));
        return $this->redirect(array('action' => 'index'));
    }*/

   
   

     public function edit($id){
 
        $model = $this->modelClass;
        if ($this->request->is('post')) {
            
            $toSave = array(
              'id'       => $id,
              'email'    => $this->data['email'], 
           //   'password' => $this->data['contraseÃ±a'],
              'nombre'   => $this->data['nombre'],
              'apellido' => $this->data['apellido'],
             // 'dni'      => $this->data['dni'], 
              'fk_tipo'  => $this->data['fk_tipo'],
              'username' =>   $id,
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

        $this->loadModel('Tipos');
        $tipos = $this->Tipos->find('all');
        $this->set('tipos', $tipos);
 
        $model = $this->modelClass;
        if ($this->request->is('post')) {
            
            $toSave = array(
              'id'        => $id,
              'email'     => $this->data['email'], 
           //   'password'  => $this->data['password'],
              'nombre'    => $this->data['nombre'],
              'apellido'  => $this->data['apellido'],
            //  'dni'       => $this->data['dni'], 
              'fk_tipo'   => $this->data['fk_tipo'],
              'username'  =>   $id,
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
        
    
        $this->Post->deleteAll(array('fk_usuario'=> $id));

        $this->RespuestasPost->deleteAll(array('fk_usuario'=> $id));

        $this->Usuariojr->deleteAll(array('pk_usuario'=> $id));
      
        $this->$model->delete($id);

        $this->Session->setFlash(Configure::read('m.flash/form_saved') , 'alert-error');

        return $this->redirect(array(
            'action' => 'index'
        ));
     }
    

    public function add() {
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(
                __('The user could not be saved. Please, try again.')
            );
        }
    }


    public function register() {

    $this->autoRender = false;
    $this->loadModel('User');
    $this->loadModel('UsuarioMedico');
    
     if ($this->request->data) {
          $post = $this->request->data;
          $email      = $post['email'];
          $password   = $post['password'];  
          $nombre     = $post['nombre'];    
          $apellido   = $post['apellido'];
          $dni        = $post['dni']; 
          $tipo       = $post['fk_tipo']; 
         
          $passwordHasher = new BlowfishPasswordHasher();

          if(empty($usuario_v)){
            $guardar = $this->User->save(array(
                        'email'      =>   $email,
                        'password'   =>   $passwordHasher->hash($password),
                        'nombre'     =>   $nombre ,  
                        'apellido'   =>   $apellido , 
                        'id'         =>   $dni , 
                        'fk_tipo'    =>   $tipo,
                        'username'   =>   $dni,  
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


     public function validar(){
    
      $model = $this->modelClass;
      $this->loadModel('Preguntas');
      $this->loadModel('Respuestas');
      
      $preguntas = $this->Preguntas->find('all');
      $validar = array();

      foreach ($preguntas as $key => $preg) {
       
        $respuestas = $this->Respuestas->find('all',array('conditions'=>array('pk_pregunta'=> $preg["Preguntas"]["id"])));

        $val["Preguntas"]  = $preg["Preguntas"];
        $val["Preguntas"]["respuestas"] = $respuestas;
 
        $validar[] = $val; 

         
      }
         
       $this->set('items', $validar);

    }  

    public function SetearValidacion(){
    	$this->autoRender = false;//Para poder devolver un json
    	//Conectamos con la BD y verificamos si falló
    	$link_a_db = $this->ConnectToDB();
    	 
    	if($link_a_db == null){
    		$respuesta['mensaje_resultado'] = 'Fallo conexion con la base';
    		echo json_encode($respuesta);
    		die;
    	}
    	 
    	/*$model = $this->modelClass;
    	$this->loadModel('Respuestas');
    	 
    	$toSave = array(
    			'id'        => $this->data['id'],
    			'flag_medico'     => $this->data['validacion']
    	);
    	 
    	$saved = $this->$model->save($toSave);*/
    	 
    	$query = "UPDATE respuestas SET flag_medico = {$this->data['validacion']} WHERE id={$this->data['id']}";
    	
    	/*$respuesta['mensaje_resultado'] = $query;
    	echo json_encode($respuesta);
    	die;*/
    	
    	$saved = $link_a_db->query($query);

    	if (!$saved) {
    		$respuesta['mensaje_resultado'] = 'Fallo la validacion';
    		echo json_encode($respuesta);
    	}else{
    		$respuesta['mensaje_resultado'] = 'Validacion existosa';
    		echo json_encode($respuesta);
    	}
    	
    	
    }
    
    //Conectar con BD
    function ConnectToDB(){
    	$servername = "localhost";
    	$username = "root";
    	$password = "";
    	$dbname = 'teguio';
    
    	// Create connection
    	$conn = new mysqli($servername, $username, $password, $dbname);
    
    	// Check connection
    	if ($conn->connect_error) {
    		die("Connection failed: " . $conn->connect_error);
    	}
    
    	return $conn;
    }
    
}
?>