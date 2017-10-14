 
<?php

class CvsUsuarioJrController extends AppController {

     public function beforeFilter(){
      
      parent::beforeFilter();
 
      $model = $this->modelClass;
      $this->set('model',$model);

     }
     


     public function edit($id){
     
 
        $model = $this->modelClass;

        $this->loadModel('Usuariojr');
        $usuariojr = $this->Usuariojr->findById($id);
        $this->set('usuariojr',$usuariojr);

      
        if ($this->request->is('post')) {
            
            $toSave = array(

                'id' => $id,
                'edad_post'           => $this->data['edad_post'],
                'direccion_post'      => $this->data['direccion_post'],
                'email_post'          => $this->data['email_post'],
                'exp_laboral_post'    => $this->data['exp_laboral_post'],
                'conocimientos_post'  => $this->data['conocimientos_post'],
                'educacion_post'      => $this->data['educacion_post'],
            );
            
            $saved = $this->$model->save($toSave);

            if (!empty($saved)) {

                $idusuario = $this->Usuariojr->find('first',array('fields'    =>"pk_usuario",
                                                                  'conditions'=>array('id'=> $id)));     
             
                $this->Session->setFlash(Configure::read('m.flash/form_saved') , 'alert');
                return $this->redirect(array('controller'=> 'usuariojr','action'=> 'index/'.$idusuario["Usuariojr"]["pk_usuario"]));
            
            } 
            else {
                $this->Session->setFlash(Configure::read('m.flash/form_not_saved') , 'alert');
            }
        }

        $item = $this->$model->findById($id);
        $this->set('item', $item);
   

     }


      public function verCv($id){
     
 
        $model = $this->modelClass;

        $this->loadModel('Usuariojr');
        $usuariojr = $this->Usuariojr->findById($id);
        $this->set('usuariojr',$usuariojr);

      
        if ($this->request->is('post')) {
            
            $toSave = array(

                'id' => $id,
                'edad_post'           => $this->data['edad_post'],
                'direccion_post'      => $this->data['direccion_post'],
                'email_post'          => $this->data['email_post'],
                'exp_laboral_post'    => $this->data['exp_laboral_post'],
                'conocimientos_post'  => $this->data['conocimientos_post'],
                'educacion_post'      => $this->data['educacion_post'],
            );
            
            $saved = $this->$model->save($toSave);

            if (!empty($saved)) {

                $idusuario = $this->Usuariojr->find('first',array('fields'    =>"pk_usuario",
                                                                  'conditions'=>array('id'=> $id)));     
             
                $this->Session->setFlash(Configure::read('m.flash/form_saved') , 'alert');
                return $this->redirect(array('controller'=> 'usuariojr','action'=> 'index/'.$idusuario["Usuariojr"]["pk_usuario"]));
            
            } 
            else {
                $this->Session->setFlash(Configure::read('m.flash/form_not_saved') , 'alert');
            }
        }

        $item = $this->$model->findById($id);
        $this->set('item', $item);
   

     }



}
