<div class="features-container section-container">
    <div class="container">
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
                     <label for="exampleInputEmail1">Nueva Usuario a cargo</label>
                </div>
                <form role="form" action="" method="post"  enctype="multipart/form-data">
                    <div class="box-body">
                       <div class="col-md-12">
                            <div class="form-group" style="text-align: -webkit-left;" >
                            <span>DNI</span>
                                <textarea type="text" class="form-control" name="dni" placeholder="dni"  ></textarea>
                            </div>
                           <div class="form-group" style="text-align: -webkit-left;" >
                            <span>Nombre</span>
                                <textarea type="text" class="form-control" name="nombre" placeholder="nombre"  ></textarea>
                            </div>
                            <div class="form-group" style="text-align: -webkit-left;" >
                            <span>Apellido</span>
                                <textarea type="text" class="form-control" name="apellido" placeholder="apellido"  ></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer" >
                        <button type="submit" class="btn btn-primary">Agregar</button>
                    </div>
                </form>
                </div>
            </div>
        </section>
    </div>
</div>


