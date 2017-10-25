<?php

class ProfesionalController extends AppController {
      public $components = array("RequestHandler");
     public function beforeFilter(){
      
      parent::beforeFilter();
    
     }
  
    public function index(){
    
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

}