<?php

class UsuariojrController extends AppController {

     public function beforeFilter(){
      
      parent::beforeFilter();
      
      $this->loadModel('Usuario');

      $this->loadModel('Cvs');
      $cvs = $this->Cvs->find('all',array('order'=>array('Cvs.id ASC')));
      $this->set('cvs',$cvs);
 
      $model = $this->modelClass;
      $this->set('model',$model);


     }


    public function listaUsuariosJr($id){
    
      $model = $this->modelClass;
      $this->loadModel('Usuario');
      
      $usuario = $this->Usuario->find('first',array('conditions'=>array('id'=> $id)));
      $this->set('usuario', $usuario);


      $this->Paginator->settings = array(
            'limit' => $this->defaultLimit() ,
            'order' => "$model.id ASC",
            'conditions' =>  array("pk_usuario" => $id),
       );

       $data = $this->Paginator->paginate($model);

       $this->set('items', $data);

     }

  

     public function index($id){
    
      $model = $this->modelClass;
     
      $this->Paginator->settings = array(
            'limit' => $this->defaultLimit() ,
            'order' => "$model.id ASC",
            'conditions' =>  array("pk_usuario" => $id),
       );



       $data = $this->Paginator->paginate($model);

       $this->set('items', $data);

     }
 



     public function add(){

      $model = $this->modelClass;

        if ($this->request->is('post')) {
          
            $toSave = array(
                'id'         => $this->data['dni'],
                'nombre'     => $this->data['nombre'],
                'apellido'   => $this->data['apellido'],
                'pk_usuario' => '12345',
            );
         
            $saved = $this->$model->save($toSave);

            if (!empty($saved)) {

                $toSaveUsuarioJr = array(
                  'id'              => $this->data['dni'],
                  'nombre_post'     => $this->data['nombre'],
                  'apellido_post'   => $this->data['apellido'],
                );

                $this->Cvs->save($toSaveUsuarioJr);
                
                $idusuario = $this->$model->find('first',array('fields'    =>"pk_usuario",
                                                               'conditions'=>array('id'=> $this->data['dni'])));     
             
                $this->Session->setFlash(Configure::read('m.flash/form_saved') , 'alert');
                return $this->redirect(array('action'=> 'index/'.$idusuario["Usuariojr"]["pk_usuario"]));
            } 
            else {
                $this->Session->setFlash(Configure::read('m.flash/form_not_saved') , 'alert');
            }
        }

     }


     public function edit($id){
     

        $model = $this->modelClass;
        
        $this->loadModel('Cvs');
     
        if ($this->request->is('post')) {
            
            $toSave = array(

                'id' => $id,
                'nombre'   => $this->data['nombre'],
                'apellido' => $this->data['apellido']
            );
            
            $saved = $this->$model->save($toSave);

            if (!empty($saved)) {

                $toSaveUsuarioJr = array(
                  'id'              => $id,
                  'nombre_post'     => $this->data['nombre'],
                  'apellido_post'   => $this->data['apellido'],
                );

                $this->Cvs->save($toSaveUsuarioJr);

                              
                $idusuario = $this->$model->find('first',array('fields'    =>"pk_usuario",
                                                               'conditions'=>array('id'=> $id)));     
             
                $this->Session->setFlash(Configure::read('m.flash/form_saved') , 'alert');
                return $this->redirect(array('action'=> 'index/'.$idusuario["Usuariojr"]["pk_usuario"]));
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
        $idusuario = $this->$model->find('first',array('fields'    =>"pk_usuario",
                                                       'conditions'=>array('id'=> $id))); 
        $this->loadModel('Cvs');
        $this->Cvs->deleteAll(array('cvs.id'=> $id));
        $this->$model->delete($id);

        $this->Session->setFlash(Configure::read('m.flash/form_saved') , 'alert');
        return $this->redirect(array('action'=> 'index/'.$idusuario["Usuariojr"]["pk_usuario"]));


     }


}