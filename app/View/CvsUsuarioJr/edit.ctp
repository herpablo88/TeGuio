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
                                 <label for="exampleInputEmail1">DNI <?=$item[$model]['id']?></label>
                     </div>
                </div>
                <form role="form" action="" method="post"  enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="col-md-12">

                            <div class="form-group" style="text-align:-webkit-left;" >
                                <span>Edad</span>
                                <textarea type="text" class="form-control"   name="edad_post" placeholder="edad"  ><?=$item[$model]['edad_post']?></textarea>
                            </div>

                            <div class="form-group" style="text-align:-webkit-left;" >
                                <span>Direccion</span>
                                <textarea type="text" class="form-control"   name="direccion_post" placeholder="direccion"  ><?=$item[$model]['direccion_post']?></textarea>
                            </div>

                               <div class="form-group" style="text-align:-webkit-left;" >
                                <span>Email</span>
                                <textarea type="text" class="form-control"   name="email_post" placeholder="email"  ><?=$item[$model]['email_post']?></textarea>
                            </div>

                            <div class="form-group" style="text-align:-webkit-left;" >
                                <span>Experiencia Laboral</span>
                                <textarea type="text" class="form-control"   name="exp_laboral_post" placeholder="Complete experiencia laboral"  ><?=$item[$model]['exp_laboral_post']?></textarea>
                            </div>

                            <div class="form-group" style="text-align:-webkit-left;" >
                                <span>Conocimientos</span>
                                <textarea type="text" class="form-control"   name="conocimientos_post" placeholder="Complete conocimientos"  ><?=$item[$model]['conocimientos_post']?></textarea>
                            </div>

                             <div class="form-group" style="text-align:-webkit-left;" >
                                <span>Educacion</span>
                                <textarea type="text" class="form-control"   name="educacion_post" placeholder="Describa educacion"  ><?=$item[$model]['educacion_post']?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer" >
                        <button type="submit" class="btn btn-primary">Modificar</button>
                    </div>
                 </form>
                </div>
            </div>
        </section>
    </div>
</div>



