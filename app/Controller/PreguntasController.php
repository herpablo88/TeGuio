<?php

class PreguntasController extends AppController {
      public $components = array("RequestHandler");
     public function beforeFilter(){
      
      parent::beforeFilter();
      $model = $this->modelClass;
      $this->set('model',$model);
     }
  
     /* cuando guardo la pregunta se guarda en fk_preg , junto con el dni */
      /* se muestra el listado del dni que se envia */
    public function index($id){
    
      $model = $this->modelClass;
      $this->loadModel('Usuariojr');
      $this->loadModel('Historico');
      
      $usuariojr = $this->Usuariojr->find('first',array('conditions'=>array('id'=> $id),'fields'=>'id'));
      $this->set('usuariojr', $usuariojr);
     
      $historico = $this->Historico->find('all',array('conditions'=>array('id'=> $usuariojr["Usuariojr"])));
      $this->set('historico', $historico);

      $id = array();
      foreach ($historico as $key => $preg_id) {
         $id[] = $preg_id["Historico"]["fk_preg"];
      } 

      $this->Paginator->settings = array(
        'limit' => $this->defaultLimit() ,
        'order' => "$model.id ASC",
        'conditions' =>  array("id" => $id),
      );

       $data = $this->Paginator->paginate($model);

       $this->set('items', $data);

    }  

     public function add($id_usuariojr,$idusuario){
      $this->loadModel('Historico');
      $model = $this->modelClass;
        if ($this->request->is('post')) {
          
            $toSave = array(
                'descripcion' => $this->data['descripcion'],
            );

            $savedPregunta = $this->$model->save($toSave);

            if (!empty($savedPregunta)) {
                        
                $toSaveRelacion = array(
                  'id'      => $id_usuariojr,
                  'fk_preg' => $this->$model->id,
                );

                 $relacion = $this->Historico->save($toSaveRelacion);
  
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


     public function delete($id,$id_usuariojr){

        $this->loadModel('Historico');
        $model = $this->modelClass;
        $this->Historico->deleteAll(array('fk_preg'=> $id));
        $this->$model->delete($id);
        $this->Session->setFlash(Configure::read('m.flash/form_saved') , 'alert-error');
        return $this->redirect(array(
            'action' => 'index'.$id_usuariojr
        ));
     }


}