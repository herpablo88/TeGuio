<div class="modal modal-danger">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <p class='modal-text'></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-outline ok-button">Ok</button>
            </div>
        </div>
    </div>
</div>




             


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
        <h3 class="modal-title" id="modal-title">Registro Usuario</h3>
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
        
                <input type="password" id="password" class="form-control" name="password" placeholder="contraseña" />
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

                 <input type="hidden" id="fk_tipo" class="form-control " name="fk_tipo" value="2" /> 
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
        
                <input type="password" id="password" class="form-control" name="password" placeholder="contraseña" />
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

    
