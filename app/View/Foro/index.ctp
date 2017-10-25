<div class="features-container section-container">
  <div class="container">
    <section class="content-header" style="padding-top:74px">
            <ol class="breadcrumb">
               <li class="active"><a href="<?=Router::url('/Foro',true)?>">Foro</a></li>
            </ol>
            <h3 class="box-title">Tu consejo es la pieza que falta</h3>
    </section> 
    <section class="content row">
      <div class="col-md-12">
        <section class="content row">
          <div class="box box-primary">
            <div class="box-header with-border" style="text-align: left">
              <ul class="list-group">
                <li class="list-group-item list-group-item-success"> 
                   <a href="#" data-toggle="modal" data-target="#particular-modal-foro"><h4>Realizar Consulta</h4></a>
                </li>
                <li data-toggle="collapse" data-target="#service" class="list-group-item list-group-item-info collapsed">
                  <a href="#"></i><h4> Listado del Foro </h4><span class="arrow"></span></a>
                </li>  
                <ul class="sub-menu collapse col-md-12" id="service">
                  <?php if (empty($items)):
                  print(' <li class="list-group-item list-group-item-warning" style="background-color: #e7daf0">No hay debates</li>');
                  else :
                  ?>
                  <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                      <tbody>
                        <?php foreach($items as $item): ?>
                         <a href="#" style="color: #a62594;"> <li class="list-group-item list-group-item-warning" style="background-color: #e7daf0"><span action-redirect btn-controller='foro' btn-action='verforo' btn-data="<?=$item[$model]['id']?>"><?=$item[$model]['descripcion']?></span></li></a>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div><!-- /.box-body -->
                <?php endif; ?>        
              </ul>
            </div>
          </div>  
          <div class="col-sm-12 features">
            <img src="<?=Router::url('/img/foris.jpg',true)?>" style="image-rendering: unset;margin:auto;" class="img-responsive">
          </div>
      </section>
    </div>
   </section>
  </div>
</div> <!-- /container -->

    
<div class="modal fade" id="particular-modal-foro" tabindex="-1" role="dialog" aria-labelledby="modal-title" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 class="modal-title" id="modal-title">Nueva Consulta a la Comunidad</h3>
      </div>
      <div class="modal-body">
        <?php 
          echo $this->Form->create(null, array(
              'url' => array('controller' => 'Foro', 'action' => 'add'),
              
            )
          );
        ?>
        <div class="row">
          <div class="col-md-2"></div>
          <div class="col-md-8 ">
              <label for="email">Detalle Consulta</label>
              <div class="form-group">
                <textarea type="text" class="form-control"  name="descripcion" placeholder="Escriba su consulta"  ></textarea>
              </div>
          </div>
          <input type="hidden" id="user" class="form-control " name="user" value="1" /> 
          <!--<input type="hidden" id="user" class="form-control " name="user" value="<?=$user["id"]?>" /> -->
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

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="js/bootstrap.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="js/ie10-viewport-bug-workaround.js"></script>




     