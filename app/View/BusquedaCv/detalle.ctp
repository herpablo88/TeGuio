<div class="features-container section-container">
    <div class="container">
        <section class="content-header" style="padding-top:74px">
            <ol class="breadcrumb">
               <li class="active"><a href="<?=Router::url('/cvsusuariojr',true)?>">Usuario Jr</a></li>
            </ol> 
            <h3 class="box-title"><strong><?=$item[$model]['nombre_post']." ".$item[$model]['apellido_post']?></strong></h3>
        </section>
        <section class="content row" id="contBusquedaCVDetalle">
            <div class="col-sm-12">
                <div class="box box-primary">
                <div class="col-sm-12">
                    <div class="col-sm-6">
                        <div class="box-header with-border" style="text-align: left">
                            <div class="form-group" style="text-align:-webkit-left;" >
                                <label for="exampleInputEmail1">DNI <?=$item[$model]['id']?></label>
                            </div>
                            <div class="form-group" style="text-align:-webkit-left;" >
                                <label for="exampleInputEmail1">Edad : </label>
                                <?=$item[$model]['edad_post']?>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                         <div class="box-header with-border" style="text-align: left">
                            <div class="form-group" style="text-align:-webkit-left;" >
                                 <label for="exampleInputEmail1">Email : </label>
                                <?=$item[$model]['email_post']?>
                            </div>
                            <div class="form-group" style="text-align:-webkit-left;" >
                                <label for="exampleInputEmail1">Direccion : </label>
                                <?=$item[$model]['direccion_post']?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-body">
                        <div class="col-md-12">

                            <div class="form-group" style="text-align:-webkit-left;" >
                                 <label for="exampleInputEmail1">Experiencia Laboral : </label>
                                <?=$item[$model]['exp_laboral_post']?>
                            </div>

                            <div class="form-group" style="text-align:-webkit-left;" >
                                 <label for="exampleInputEmail1">Conocimientos : </label>
                                <?=$item[$model]['conocimientos_post']?>
                            </div>

                             <div class="form-group" style="text-align:-webkit-left;" >
                                 <label for="exampleInputEmail1">Educacion : </label>
                                <?=$item[$model]['educacion_post']?>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer" >
                        <a href="<?=Router::url('/busquedaCv',true)?>" style="color:white;"><button  class="btnTeguio">Volver a la Busqueda</button></a>
                    </div>
                 </form>
                </div>
            </div>
        </section>
    </div>
</div>



