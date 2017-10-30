<?php

class PreguntasController extends AppController {
      public $components = array("RequestHandler");
     public function beforeFilter(){
      
      parent::beforeFilter();
      $model = $this->modelClass;
      $this->set('model',$model);
     }
  

    public function index($id){
  
      $model = $this->modelClass;
      $this->loadModel('Usuariojr');
      
      $usuariojr = $this->Usuariojr->find('first',array('conditions'=>array('id'=> $id),'fields'=>'id'));
      $this->set('usuariojr', $usuariojr);
   
      $preguntas = $this->$model->find('all',array('conditions'=>array('usuariojr'=> $usuariojr["Usuariojr"]["id"])));
      $this->set('preguntas', $preguntas);

      $id = array();
      foreach ($preguntas as $key => $preg_id) {
         $id[] = $preg_id["Pregunta"]["id"];
      }
      $this->Paginator->settings = array(
        'limit' => $this->defaultLimit() ,
        'order' => "$model.id ASC",
        'conditions' =>  array("id" => $id),
      );

       $data = $this->Paginator->paginate($model);

       $this->set('items', $data);
         $model = $this->modelClass;

     

    }  

     public function add($id_usuariojr){
     
      $model = $this->modelClass;
        if ($this->request->is('post')) {
          
            $toSave = array(
                'descripcion'  => $this->data['descripcion'],
                'usuariojr' => $id_usuariojr,
            );

            $savedPregunta = $this->$model->save($toSave);
            if (!empty($savedPregunta)) {
            
                $this->Session->setFlash(Configure::read('m.flash/form_saved') , 'alert');
                return $this->redirect(array('action'=> 'index/'.$id_usuariojr));
            } 
            else {
                $this->Session->setFlash(Configure::read('m.flash/form_not_saved') , 'alert');
            }
        }

     }


     public function edit($id,$id_usuariojr){

        $model = $this->modelClass;
        
        if ($this->request->is('post')) {
            
            $toSave = array(

                'id' => $id,
                'descripcion'  => $this->data['descripcion'],        
            );
            
            $saved = $this->$model->save($toSave);

            if (!empty($saved)) {
                          
                $this->Session->setFlash(Configure::read('m.flash/form_saved') , 'alert');
                return $this->redirect(array('action'=> 'index/'.$id_usuariojr));
            } 
            else {
                $this->Session->setFlash(Configure::read('m.flash/form_not_saved') , 'alert');
            }
        }
        $item = $this->$model->findById($id);
        $this->set('item', $item);

      

     }

     
     public function respuestas($id,$id_usuariojr){
        $model = $this->modelClass;
        $this->loadModel('Respuestas');
        $pregunta = $this->$model->find('first',array('conditions'=>array('id'=> $id)));
        $this->set('pregunta', $pregunta);
        $this->set('id_usuariojr', $id_usuariojr);
       $respuestas = $this->Respuestas->find('all',array('conditions'=>array('pk_pregunta'=> $id)));
        $this->set('respuestas', $respuestas);
        
        if ($this->request->is('post')) {
            
            $toSave = array(
                'descripcion'  => $this->data['descripcion'],
                'pk_pregunta'  => $this->data['pk_pregunta'], 
                'ranking_positivo'  => $this->data['pk_pregunta'],
                'ranking_negativo'  => $this->data['pk_pregunta'],
                      
            );
            
            $saved = $this->Respuestas->save($toSave);

            if (!empty($saved)) {
                          
                $this->Session->setFlash(Configure::read('m.flash/form_saved') , 'alert');
                return $this->redirect(array('action'=> 'respuestas/'.$id.'/'.$id_usuariojr));
            } 
            else {
                $this->Session->setFlash(Configure::read('m.flash/form_not_saved') , 'alert');
            }
        }
        $item = $this->$model->findById($id);
        $this->set('item', $item);

     }
  
 

     public function delete($id,$id_usuariojr){

        $this->loadModel('Respuestas');
        $model = $this->modelClass;
        $this->Respuestas->deleteAll(array('pk_pregunta'=> $id));
        $this->$model->delete($id);
         $this->Session->setFlash('Factor de Crisis Eliminado', 'alert');
        return $this->redirect(array(
            'action' => 'index'.'/'.$id_usuariojr
        ));
     }


}