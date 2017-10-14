<?php
class UsersController extends AppController {
    public $uses = array('User');
    public $components = array("RequestHandler");

	public function beforeFilter() {
    	parent::beforeFilter();
    }

    public function login() {

        if ($this->request->is('post')) { 
            if ($this->Auth->login()) { var_dump('entro');die;
                $this->Session->setFlash(
                    'Bienvenido a Teguio-InclusionAutismo', 
                    'default', 
                    array('class' => 'hidden notice')
                );
                return $this->redirect($this->referer());
            }var_dump('no entro');die;
            $this->Session->setFlash(
                'Por favor verifique su dni y contraseña e intente nuevamente',
                'default',
                array('class' => 'hidden error')
            );

            return $this->redirect($this->referer());
        }var_dump('no entro');die;
        return $this->redirect(array('controller' => 'pages', 'action' => 'index'));
    }

    public function logout() {
        $this->Session->destroy();
        return $this->redirect($this->Auth->logout());
    }

    public function register() {
        $this->autoRender = false;
        $this->RequestHandler->respondAs('application/json');
        if (!$this->request->is('post')) {
            return json_encode(array('success' => false));
        }
        
        if ($this->Usuario->save($this->request->data)) {
            return json_encode(array('success' => true));

        } else {
            $errors = $this->Usuario->validationErrors;
            return json_encode(array('success' => false, 'errors' => $errors));
        }
        
    }
}
?>