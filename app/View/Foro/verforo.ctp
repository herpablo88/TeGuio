<div class="features-container section-container">
  <div class="container">
    <section class="content-header" style="padding-top:74px">
            <ol class="breadcrumb">
               <li class="active"><a href="<?=Router::url('/Foro',true)?>">Foro</a></li>
            </ol>
            <h3 class="box-title">Tu consejo es la pieza que falta</h3>
    </section>
    <section class="content row">
      <div class="col-sm-12">
        <div class="box box-primary">
          <div class="box-header with-border" style="text-align: left">
            <div class="review-block">
              <div class="row" style="background-color: antiquewhite;">
                <div class="col-sm-3">
                  <div class="review-block-name"><a href="#"><?=$item['nombre']?></a></div>
                  <div class="review-block-date"><?=$item['fecha']?><br/><?php 
                  $fecha1 = new DateTime(date("y-m-d H:i:s"));
                  $fecha2 = new DateTime($item['fecha']);
                  $fecha = $fecha1->diff($fecha2);
                  if($fecha->y >'1' ){
                    printf('hace %d años',$fecha->y);
                  }elseif ($fecha->m >'1') {
                    printf('hace %d meses', 
                    $fecha->m);
                  }elseif ($fecha->d >'1') {
                    printf('hace %d días', 
                    $fecha->d);
                  }elseif($fecha->h < '24' and $fecha->h > '0') {
                    printf('hace %d horas, %d minutos', 
                    $fecha->h, $fecha->i); 
                  }elseif($fecha->i < '2') {
                    printf('hace unos instantes');
                  }else{
                    printf('hace %d minutos', 
                    $fecha->i);
                  }
                  ?></div>
                </div>
                <div class="col-sm-9">
                  <!--<div class="review-block-rate">
                     <div class="review-block-title"><strong>Consulta Escuela</strong></div>
                  </div>-->
                  <div class="review-block-description"><strong><?=$item['descripcion']?></strong></div>
                </div>
              </div>
           
            <?php if (!empty($respuestasPost)){  ?>  
              <?php foreach($respuestasPost as $itemRepsuestas): ?>
              <hr/>
              <div class="row">
                <div class="col-sm-3">
                  <div class="review-block-name"><a href="#"><?=$itemRepsuestas["nombre"]?></a></div>
                  <div class="review-block-date"><?=$itemRepsuestas["fecha"]?><br/><?php 
                  $fecha1 = new DateTime(date("y-m-d H:i:s"));
                  $fecha2 = new DateTime($itemRepsuestas['fecha']);
                  $fecha = $fecha1->diff($fecha2);
                  if($fecha->y >='1' ){
                    printf('hace %d años',$fecha->y);
                  }elseif ($fecha->m >'1') {
                    printf('hace %d meses', 
                    $fecha->m);
                  }elseif ($fecha->d >'1') {
                    printf('hace %d días', 
                    $fecha->d);
                  }elseif($fecha->h < '24' and $fecha->h > '0') {
                    printf('hace %d horas, %d minutos', 
                    $fecha->h, $fecha->i);
                  }elseif($fecha->i < '2') {
                    printf('hace unos instantes');
                  }else{
                    printf('hace %d minutos', 
                    $fecha->i);
                  }
                  ?></div>
                </div>
                <div class="col-sm-9">
                   <div class="review-block-description"><?=$itemRepsuestas["descripcion"]?></div>
                </div>
              </div>
             
              <?php endforeach; ?>
            <?php  } ?>  
            </div>
          </div>
          <form role="form" action="" method="post"  enctype="multipart/form-data">
            <div class="box-body">
               <div class="col-md-12">
                  <div class="form-group" style="text-align: -webkit-left;" >
                  <span>Escribi tu consejo</span>
                      <textarea type="text" class="form-control" name="descripcion" placeholder="comentario"  ></textarea>
                  </div>
                  <input type="hidden" id="user" class="form-control " name="user" value="12345" /> 
                </div>
            </div>
            <div class="box-footer" >
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
          </form>
        </div>
      </div>
    </section>
  </div>
</div> <!-- /container -->

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="js/bootstrap.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="js/ie10-viewport-bug-workaround.js"></script>

