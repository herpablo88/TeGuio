<div class="features-container section-container">
    <div class="container" id="contAddHistorico">
        <section class="content-header" style="padding-top:74px">
            <ol class="breadcrumb">
               <li class="active"><a href="<?=Router::url('/preguntas',true)?>">Preguntas</a></li>
            </ol>
            <h3 class="box-title">Factor de Crisis</h3>
        </section>
        <section class="content row">
            <div class="col-sm-12">
                <div class="box box-primary">
                <div class="box-header with-border" style="text-align: left">
                     <label for="exampleInputEmail1">Nuevo factor</label>
                </div>
                <form role="form" action="" method="post"  enctype="multipart/form-data" id="formAddHistorico">
                    <div class="box-body">
                       <div class="col-md-12">
                           <div class="form-group" style="text-align: -webkit-left;" >
                            <span>Descripcion</span>
                                <textarea type="text" class="form-control" name="descripcion" placeholder="descripcion"  ></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer" >
                        <button type="submit" class="btnTeguio">Agregar</button>
                    </div>
                </form>
                </div>
            </div>
        </section>
    </div>
</div>


