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
            <li><a href="<?=Router::url('/',true)?>">Home</a></li>
             <li class="<?=($this->request->params['controller'] == 'foro')?'active':null?>"><a href="<?=Router::url('/foro',true)?>"><i class="fa fa-globe fa-lg"></i> <span>Foro</span></a></li>
           <!--   <li class="<?=($this->request->params['controller'] == 'preguntas')?'active':null?>"><a href="<?=Router::url('/preguntas',true)?>"><i class="fa fa-check-square-o"></i> <span>Preguntas</span></a></li>-->
            <li class="<?=($this->request->params['controller'] == 'usuarios')?'active':null?>"><a href="<?=Router::url('/usuarios',true)?>"><i class="glyphicon glyphicon-user"></i> <span>Usuarios</span></a></li> 
            <li ><span style="margin: 6%" class="btn btn-default" action-redirect btn-controller='usuarios' btn-action='perfil' btn-data="12345"><span class='glyphicon glyphicon-user'> MI PERFIL</span></span></li>      
   
         
       <li class="dropdown"> 
            <a class="dropdown-toggle btn btn-link-3" data-toggle="dropdown" href="#">Ingresar
            <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#" id="register" data-toggle="modal" data-target="#registro-modal">Resgistrarme</a></li>
               <li> <?php 
                    echo $this->Form->create(null, array('url' => array('controller' => 'Users', 'action' => 'login'))); 
                  ?>
                   <p class="title">Iniciar Sesion</p>
                    <input type="text" id="dni" name="dni" placeholder="DNI" />
                    <input type="password" id="contraseña" name="contraseña" placeholder="contraseña" />
                    <input type="submit" id="login" value="Ingresar" />
                    <a href="#" id="forgot-password">Olvide mi contraseña</a>
                  <?php echo $this->Form->end(); ?>
                  </li>
               </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>




             


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
              'url' => array('controller' => 'Usuarios', 'action' => 'register'),
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
              <input type="hidden" id="fk_tipo" class="form-control " name="fk_tipo" value="2" /> 
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
              'url' => array('controller' => 'Usuarios', 'action' => 'register'),
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

                 <input type="hidden" id="fk_tipo" class="form-control " name="fk_tipo" value="3" /> 
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

    