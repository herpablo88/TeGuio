<?php

class ApiController extends AppController {

  public $components = array(
        'RequestHandler'
    );

    public function beforeFilter() {
        parent::beforeFilter();
        $this->autoRender = false;
  
        header("Content-Type: application/json");
        $this->Auth->allow('chatbox');
  
    }
    

  public function chatbox($texto){
    var_dump($texto);
 
 

  }    

} 

 