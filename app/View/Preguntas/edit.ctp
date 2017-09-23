<section class="content-header">
    <ol class="breadcrumb">
        <li class="active"><a href="<?=Router::url('/preguntas',true)?>">Preguntas</a></li>
    </ol>
</section>
<section class="content row">
    <div class="col-sm-11">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Editar</h3>
            </div>
            <form role="form" action="" method="post"  enctype="multipart/form-data">
                <div class="box-body">
                    <div class="col-md-12">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Descripcion</label>
                        <textarea type="text" class="form-control"   name="descripcion" placeholder="Descripcion"  ><?=$item[$model]['descripcion']?></textarea>
                    </div>

                 </div>
                </div>
                <div class="box-footer" >
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</section>

