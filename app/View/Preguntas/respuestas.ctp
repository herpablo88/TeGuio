
<div class="features-container section-container">
  <div class="container">
    <section class="content-header" style="padding-top:74px">
            <ol class="breadcrumb">
               <li class="active"><a href="<?=Router::url('/preguntas',true)?>">Preguntas</a></li>
            </ol>
            <h3 class="box-title"><?=strtoupper($pregunta['Pregunta']['descripcion'])?></h3>
    </section>  
    <section class="content row">
      <div class="col-sm-12">

        <div class="box box-primary">
          <div class="box-header with-border" style="text-align: left">
            <div class="review-block">
            
            <?php if (!empty($respuestas)){  ?>  
              <?php foreach($respuestas as $itemRepsuestas): ?>
              
              <div class="row" >
                <div class="col-sm-12">
                   <div class="review-block-description"><?=$itemRepsuestas["Respuestas"]["descripcion"]?></div>
                </div>
              </div>
              <hr/>
              <?php endforeach; ?>
          <?php  } ?>
          
          </div>
          <form role="form" action="" method="post"  enctype="multipart/form-data">
            <div class="box-body">
               <div class="col-md-12">
                  <div class="form-group" style="text-align: -webkit-center;" >
                  <span>Escribe la solucion</span>
                      <textarea type="text" class="form-control" name="descripcion" placeholder="comentario"  ></textarea>
                  </div>   
                 <input type="hidden" id="pk_pregunta" class="form-control " name="pk_pregunta" value="<?=strtoupper($pregunta['Pregunta']['id'])?>" />
                </div>
            </div>
            <div class="box-footer"  style="text-align: -webkit-center;">
                <button type="submit" class="btn btn-primary">Añadir Solucion</button>
                <button type="submit" class="btn btn-primary"><a style="color:white;" href="<?=Router::url('/preguntas/index/'.$id_usuariojr,true)?>">Volver al Listado</a></button>
              
            </div>
          </form>
        </div>
      </div>
    </section>
  </div>
</div> <!-- /container -->

