<?php

class ForoController extends AppController {

  public function beforeFilter(){
    parent::beforeFilter();
    $model = $this->modelClass;
    $this->set('model',$model);
  }
  

  public function index(){

    $model = $this->modelClass;
    $this->Paginator->settings = array(
          'limit' => $this->defaultLimit() ,
          'order' => "$model.fecha DESC",
     );

    $data = $this->Paginator->paginate($model);
    $this->set('items', $data);
  }


  public function verforo($id){
    
    $this->loadModel('Usuario');
    $this->loadModel('RespuestasPost'); 
    $this->loadModel('RespuestasPost');

    $model = $this->modelClass;

    $item = $this->$model->findById($id);
    $respPreg = $this->Usuario->find('first',array('conditions'=>array('id'=> $item["Foro"]["fk_usuario"])));
    $item["Foro"]["nombre"] =  $respPreg["Usuario"]["nombre"]; 
    $item = $item["Foro"];    
    $this->set('item', $item);

    $respPost = $this->RespuestasPost->find('all',array('conditions'=>array('fk_posts'=> $id)));

    foreach ($respPost as $rp) {
 
      $usuarioPost = $this->Usuario->find('first',array('conditions'=>array('id'=> $rp["RespuestasPost"]["fk_usuario"])));
      $rp["RespuestasPost"]["nombre"] = $usuarioPost["Usuario"]["nombre"];
      $respuestasPost[] = $rp["RespuestasPost"];

    }    
  
    $this->set('respuestasPost', $respuestasPost);
    
      if ($this->request->is('post')) {
        $toSave = array(
            'fk_posts'       => $id,
            'fk_usuario'     => $this->data['user'],  
            'descripcion'    => $this->data['descripcion'],
            'fecha'          => date("y-m-d H:i:s")
        );

        $saved = $this->RespuestasPost->save($toSave);

        if (!empty($saved)) {
            $this->Session->setFlash(Configure::read('m.flash/form_saved') , 'alert');
            return $this->redirect(array('action'=> 'verforo/'.$id));
        } 
        else {
            $this->Session->setFlash(Configure::read('m.flash/form_not_saved') , 'alert');
        }
    } 

  }


  public function add(){
    $model = $this->modelClass;
    if ($this->request->is('post')) {
      
      $toSave = array(
          'fk_usuario'     => $this->data['user'],
          'descripcion'    => $this->data['descripcion'],
          'fecha'          => date("y-m-d H:i:s")
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
  } 


} 

 