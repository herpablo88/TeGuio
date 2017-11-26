<div class="features-container section-container">
    <div class="container" id="contentAdminVerCV">
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
                                 <label for="exampleInputEmail1">DNI: </label>
								 <span><?=$item[$model]['id']?></span>
                     </div>
                      <div class="form-group" style="text-align:-webkit-left;" >
                                 <label for="exampleInputEmail1">Edad: </label>
								 <span><?=$item[$model]['edad_post']?></span>
                     </div>
                      <div class="form-group" style="text-align:-webkit-left;" >
                                 <label for="exampleInputEmail1">Direccion: </label>
								 <span><?=$item[$model]['direccion_post']?></span>
                     </div>
                      <div class="form-group" style="text-align:-webkit-left;" >
                                 <label for="exampleInputEmail1">Email: </label>
								 <span><?=$item[$model]['email_post']?></span>
                     </div>
                      <div class="form-group" style="text-align:-webkit-left;" >
                                 <label for="exampleInputEmail1">Experiencia laboral: </label>
								 <span><?=$item[$model]['exp_laboral_post']?></span>
                     </div>
                      <div class="form-group" style="text-align:-webkit-left;" >
                                 <label for="exampleInputEmail1">Conocimientos: </label>
								 <span><?=$item[$model]['conocimientos_post']?></span>
                     </div>
                      <div class="form-group" style="text-align:-webkit-left;" >
                                 <label for="exampleInputEmail1">Educacion: </label>
								 <span><?=$item[$model]['educacion_post']?></span>
                     </div>
                </div>
              </div>
            </div>
        </section>
    </div>
</div>



