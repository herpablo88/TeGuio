      <!-- Top menu -->
    <nav class="navbar navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">

          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#top-navbar-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

          <img src="<?=Router::url('/img/logo2.png',true)?>"  class="navbar-logo img-responsive">
        
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="top-navbar-1">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="<?=Router::url('/',true)?>" style="color: #8b6f00;">Home</a></li>
            <li><a href="<?=Router::url('/busquedaCv',true)?>" style="color: #181818;">Buscar Cv</a></li>
              <li class="dropdown">
                <div id="login-panel">
                <?php
                  if ($loggedIn) {
                ?>   
                  <?php if ($user['fk_tipo']=='3') {  ?> 
                      <li class="<?=($this->request->params['controller'] == 'users')?'active':null?>"><a href="<?=Router::url('/users/validar',true)?>" style="color: forestgreen;"><i class=""></i> <span>Validar</span></a></li>
                
                  <?php } elseif($user['fk_tipo']=='1') {  ?> 
                     <li class="<?=($this->request->params['controller'] == 'users')?'active':null?>"><a href="<?=Router::url('/users',true)?>"><i class="glyphicon glyphicon-user"></i> <span>Usuarios</span></a></li> 
                  <?php } ?>

                   <li class="<?=($this->request->params['controller'] == 'foro')?'active':null?>"><a href="<?=Router::url('/foro',true)?>" style="color: #8b3600;"><i class=""></i> <span>Foro</span></a></li>
                   <li ><span style="margin: 6%" class="btn btn-default" action-redirect btn-controller='users' btn-action='perfil' btn-data="<?=$user['id']?>"><span class='glyphicon glyphicon-user'> PERFIL</span></span></li>  
                  
                  <li >
                    <div style="padding-top: 6px;padding-left: 22px;">
                      <div id="control-panel">
                        <div id="user-data">
                          <div id="user-name"><?php echo strtoupper($user['nombre'] . " " . $user['apellido']); ?></div>
                        </div>
                      </div>
                      <div id="control-footer" style="color: gray;">
                        <?php
                            echo $this->Html->link('Cerrar sesion', array(
                              'controller' => 'users', 
                              'action'     => 'logout'
                            ),
                            array(
                              'class' => 'right'
                            )
                          );
                        ?>
                      </div>
                    </div>
                  </li>
                <?php
                  } else {
                ?>
                <a class="dropdown-toggle btn btn-link-3" data-toggle="dropdown" href="#">Ingresar
                <span class="caret"></span></a>
                <ul class="dropdown-menu">
                
                  <li>
                  <?php 
                    echo $this->Form->create(null, array('url' => array('controller' => 'Users', 'action' => 'login'))); 
                  ?>
					<p class="title">Iniciar Sesion</p>
                   <div class="users form">
                     <?php echo $this->Session->flash('auth'); ?>
                     <?php echo $this->Form->create('User'); ?>
                      <fieldset>

                       <?php //echo $this->Form->input('username'); Merge conflict
                             //echo $this->Form->input('password'); Merge conflict

                     		echo $this->Form->input('username', array( 'label' => 'DNI' ));
                            echo $this->Form->input('password', array( 'label' => 'Contraseña' ));

                        ?>
                      </fieldset>
                     <?php echo $this->Form->end(array('label' => __('Ingresar', true), 'class' => 'btnTeguio')); ?>
                    </div>
                  </li>
				  
				   <li>
					<i class="fa fa-hand-o-right" aria-hidden="true"></i>
					<a href="#" id="register" data-toggle="modal" data-target="#registro-modal">Registrarme</a>
				  </li>
             
                </ul>
                <?php
                  }
                ?>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>




             
