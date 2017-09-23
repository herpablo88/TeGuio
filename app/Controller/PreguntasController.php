<?php

class PreguntasController extends AppController {

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

        $this->set('items', $data);

     }


     public function add(){

      $model = $this->modelClass;
        if ($this->request->is('post')) {
          
            $toSave = array(
                'descripcion'    => $this->data['descripcion'],
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


     public function edit($id){
     

        $model = $this->modelClass;
        
        if ($this->request->is('post')) {
            
            $toSave = array(

                'id' => $id,
                'descripcion'  => $this->data['descripcion'],        
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


     public function delete($id){

        $model = $this->modelClass;
 
        $this->$model->delete($id);
        $this->Session->setFlash(Configure::read('m.flash/form_saved') , 'alert-error');
        return $this->redirect(array(
            'action' => 'index'
        ));


     }


}