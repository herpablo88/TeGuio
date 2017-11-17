<div class="features-container section-container">
    <div class="container" id="editarUsuarioAcargo">
        <section class="content-header" style="padding-top:74px">
            <ol class="breadcrumb">
               <li class="active"><a href="<?=Router::url('/usuariojr',true)?>">Usuario Jr</a></li>
            </ol>
            <h3 class="box-title">Usuario a Cargo</h3>
        </section>
        <section class="content row">
            <div class="col-sm-12">
                <div class="box box-primary">
                <div class="box-header with-border" style="text-align: left">
                     <label for="exampleInputEmail1">Modificar usuario a cargo</label>
                </div>
                <form role="form" action="" method="post"  enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="col-md-12">

                            <div class="form-group" style="text-align:-webkit-left;" >
                                 <label for="exampleInputEmail1">DNI <?=$item[$model]['id']?></label>
                            </div>

                            <div class="form-group" style="text-align:-webkit-left;" >
                                <span>Nombre</span>
                                <textarea type="text" class="form-control"   name="nombre" placeholder="Descripcion"  ><?=$item[$model]['nombre']?></textarea>
                            </div>

                            <div class="form-group" style="text-align:-webkit-left;" >
                                <span>Apellido</span>
                                <textarea type="text" class="form-control"   name="apellido" placeholder="Descripcion"  ><?=$item[$model]['apellido']?></textarea>
                            </div>
               
                            
                        </div>
                    </div>
                    <div class="box-footer" >
                        <button type="submit" class="btnTeguio">Modificar</button>
                    </div>
                 </form>
                </div>
            </div>
        </section>
    </div>
</div>



