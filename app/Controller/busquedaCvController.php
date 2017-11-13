<?php

class BusquedacvController extends AppController {

     public function beforeFilter(){
      
      parent::beforeFilter();
 
      $model = $this->modelClass;
      $this->set('model',$model);

     }



     public function index(){
      
      $model = $this->modelClass;

      $this->Paginator->settings = array(
            'limit' => $this->defaultLimit() ,
            'order' => "$model.id ASC",
       ); 
      $data = $this->Paginator->paginate($model);
      
      if ($this->request->is('post')) {
        $data = $this->$model->find('all',array('conditions'=>array('conocimientos_post LIKE' => "%" .$this->data['string']. "%")));
  
      }
      $this->set('items', $data);

     }
 

     public function detalle($id){
       
        $model = $this->modelClass;
        $item = $this->$model->findById($id);
        $this->set('item', $item);
     }


}