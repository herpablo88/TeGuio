<div class="features-container section-container">
    <div class="container">
        <section class="content-header" style="padding-top:74px">
            <ol class="breadcrumb">
               <li class="active"><a href="<?=Router::url('/cvsusuariojr',true)?>">Usuario Jr</a></li>
            </ol> 
            <h3 class="box-title">Cv de <?=$item[$model]['nombre_post']." ".$item[$model]['apellido_post']?></h3>
        </section>
        <section class="content row">
            <div class="col-sm-12">
                <div class="box box-primary">
                <div class="box-header with-border" style="text-align: left">
                    <div class="form-group" style="text-align:-webkit-left;" >
                                 <label for="exampleInputEmail1">DNI : <?=$item[$model]['id']?></label>
                     </div>
                      <div class="form-group" style="text-align:-webkit-left;" >
                                 <label for="exampleInputEmail1">Edad : <?=$item[$model]['edad_post']?></label>
                     </div>
                      <div class="form-group" style="text-align:-webkit-left;" >
                                 <label for="exampleInputEmail1">Direccion : <?=$item[$model]['direccion_post']?></label>
                     </div>
                      <div class="form-group" style="text-align:-webkit-left;" >
                                 <label for="exampleInputEmail1">Email : <?=$item[$model]['email_post']?></label>
                     </div>
                      <div class="form-group" style="text-align:-webkit-left;" >
                                 <label for="exampleInputEmail1">Experiencia laboral : <?=$item[$model]['exp_laboral_post']?></label>
                     </div>
                      <div class="form-group" style="text-align:-webkit-left;" >
                                 <label for="exampleInputEmail1">Conocimientos :<?=$item[$model]['conocimientos_post']?></label>
                     </div>
                      <div class="form-group" style="text-align:-webkit-left;" >
                                 <label for="exampleInputEmail1">Educacion : <?=$item[$model]['educacion_post']?></label>
                     </div>
                </div>
              </div>
            </div>
        </section>
    </div>
</div>



