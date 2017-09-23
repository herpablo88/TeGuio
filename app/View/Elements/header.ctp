 
  <!-- Main Header -->
      <header class="main-header">

        <!-- Logo -->
        <a href="#" class="logo">
    
          <span class="logo-mini"><img src="<?=Router::url('/img/iconos.png',true)?>" class="img-circle" alt="User Image"></span>
   
          <span class="logo-lg"><img src="<?=Router::url('/img/iconos.png',true)?>" style="height: 40px;" class="img-circle" alt="User Image"><?=Configure::read('m.layout/header_title')?></span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
         <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
             
                <!-- .Login -->  
    
        <li class="dropdown">
          <a href="#" class="dropdown-toggle user" data-toggle="dropdown" id="iniciar-sesion">
            <span class="user"></span>
          </a>
         <li class="dropdown user user-menu">
            <li>
              <div id="login-panel">
                <?php
                  if ($loggedIn) {
                ?>
                 <!-- Menu Toggle Button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
           
                  <span class="hidden-xs"> <i class="fa fa-user"></i> Bienvenido <?=$admin['nombre']?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- The user image in the menu -->
                  <li class="user-header">
                    <p>
                      
                      <small><?=$admin['nombre']?> ?></small>
                    </p>
                  </li>
                  
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="<?=Router::url('/admin/edit',true)?>" class="btn btn-default btn-flat">Mi Perfil</a>
                    </div>
                    <div class="pull-right">
                      <a href="<?=Router::url('/users/logout',true)?>" class="btn btn-default btn-flat">  Salir </a>
                    </div>
                  </li>
                </ul>
                  <div id="control-footer">
                    <?php
                      $modal = '#particular-modal';
                      echo '<a href="#" class="pencil" data-toggle="modal" data-target="'. $modal .'">';
                        echo '<span class="fa fa-pencil"></span>';
                      echo '</a>';
                      echo $this->Html->link('Cerrar sesion', array(
                          'controller' => 'Users', 
                          'action' => 'logout'
                        ),
                        array(
                          'class' => 'right'
                        )
                      );
                    ?>
                  </div>
                <?php
                  } else {
                ?>
                  <?php 
                    echo $this->Form->create(null, array('url' => array('controller' => 'Users', 'action' => 'login'))); 
                  ?>
                    <p class="title">Iniciar Sesion</p>
                    <input type="dni" id="dni" name="dni" placeholder="DNI" />
                    <input type="password" id="contraseña" name="contraseña" placeholder="contraseña" />
                    <input type="submit" id="login" value="Ingresar" />
                    <a href="#" id="forgot-password">Olvide mi contraseña</a>
                  <?php echo $this->Form->end(); ?>
                  <p class="register-container">
                    <a href="#" id="register" data-toggle="modal" data-target="#registro-modal">Registrarse</a>
                  </p>
                <?php
                  }
                ?>
              </div>
            </li>
          </ul>
        </li><!-- /.Login -->
     
          </div>
        </nav>
      </header>


    <div class="modal fade" id="registro-modal" tabindex="-1" role="dialog" aria-labelledby="modal-title" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="modal-title">Tu ayuda es la pieza que falta .. </span></h4>
      </div>
      <div class="modal-body center-text">
        <h1 class="registro-heading">Bienvenido a TEGUIO</h1>
        <p>Para registrarse indique acontinuación su clase de usuario:</p>
        <div class="row">
          <div class="col-md-1"></div>
          <div class="col-md-4 button-pink">
            <a href="#" data-toggle="modal" data-target="#particular-modal"><h3>Usuario</h3></a>
            <span>Usted podra realizar consultas e intercambiar opiniones con la comunidad,obtener historico y cargar cv para futuras busquedas de empleo.</span>
          </div>
          <div class="col-md-2"></div>
          <div class="col-md-4 button-pink">
            <a href="#" data-toggle="modal" data-target="#profesional-modal"><h3>Profesional</h3></a>
            <span>Usted podra realizar un gran aporte a la comunidad mediante sus conocimientos, aconsejando y validando respuestas. </span>
          </div>
          <div class="col-md-1"></div>
        </div>
      </div>
    </div>
  </div>
</div>




<div class="modal fade" id="particular-modal" tabindex="-1" role="dialog" aria-labelledby="modal-title" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 class="modal-title" id="modal-title">Registro de Usuario</h3>
      </div>
      <div class="modal-body">
        <?php 
          echo $this->Form->create(null, array(
              'url' => array('controller' => 'Users', 'action' => 'register'),
              'id' => 'particularForm'
            )
          );
        ?>
        <div class="row">
          <div class="col-md-2"></div>
          <div class="col-md-8 ">
              <label for="email">Email</label>
              <div class="form-group">
                <input type="text" id="email" class="form-control " name="email" placeholder="email" />
              </div>
            
              <label for="password">Contraseña</label>
              <div class="form-group">
                <input type="password" id="contraseña" class="form-control" name="contraseña" placeholder="contraseña" />
              </div>
            
              <label for="nombre">Nombre</label>
              <div class="form-group">
                 <input type="text" id="nombre" class="form-control " name="nombre" placeholder="nombre" />
              </div>
            
              <label for="apellido">Apellido</label>
              <div class="form-group">
                 <input type="text" id="apellido" class="form-control " name="apellido" placeholder="apellido" />           
              </div>
     
             <label for="dni">DNI</label>
              <div class="form-group">
                 <input type="text" id="dni" class="form-control " name="dni" placeholder="dni" /> 
              </div>
          </div>
              <input type="hidden" id="tipo" class="form-control " name="tipo" value="2" /> 
          <div class="col-md-2"></div>
        </div>
        <div class="row">
          <div class="col-md-2"></div>
          <div class="col-md-8">
              <input type="submit" id="enviar-registro" value="Enviar" />
          </div>
          <div class="col-md-2"></div>
        </div>
        <?php echo $this->Form->end(); ?>
      </div>
    </div>
  </div>
</div>
        
      
    
  
<div class="modal fade" id="profesional-modal" tabindex="-1" role="dialog" aria-labelledby="modal-title" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 class="modal-title" id="modal-title">Registro del Profesional</h3>
      </div>
      <div class="modal-body">
        <?php 
          echo $this->Form->create(null, array(
              'url' => array('controller' => 'Users', 'action' => 'register'),
              'id' => 'particularForm'
            )
          );
        ?>
        <div class="row">
          <div class="col-md-2"></div>
          <div class="col-md-8 ">
                   
              <label for="dni">Matricula</label>
              <div class="form-group">
                 <input type="text" id="matricula" class="form-control " name="matricula" placeholder="matricula" /> 
              </div>

              <label for="email">Email</label>
              <div class="form-group">
              
                <input type="text" id="email" class="form-control " name="email" placeholder="email" />
              
              </div>
            
              <label for="password">Contraseña</label>
              <div class="form-group">
                <input type="password" id="contraseña" class="form-control" name="contraseña" placeholder="contraseña" />
              </div>
            
              <label for="nombre">Nombre</label>
              <div class="form-group">
                 <input type="text" id="nombre" class="form-control " name="nombre" placeholder="nombre" />
              </div>
            
              <label for="apellido">Apellido</label>
              <div class="form-group">
                 <input type="text" id="apellido" class="form-control " name="apellido" placeholder="apellido" />           
              </div>
     
             <label for="dni">DNI</label>
              <div class="form-group">
                 <input type="text" id="dni" class="form-control " name="dni" placeholder="dni" /> 
              </div>

              <input type="hidden" id="tipo" class="form-control " name="tipo" value="3" /> 
          </div>
        
          <div class="col-md-2"></div>
        </div>
        <div class="row">
          <div class="col-md-2"></div>
          <div class="col-md-8">
              <input type="submit" id="enviar-registro" value="Enviar" />
          </div>
          <div class="col-md-2"></div>
        </div>
        <?php echo $this->Form->end(); ?>
      </div>
    </div>
  </div>
</div>