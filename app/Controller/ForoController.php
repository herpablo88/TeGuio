<?php

class ForoController extends AppController {
   public function beforeFilter(){
      
      parent::beforeFilter();
 

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
}