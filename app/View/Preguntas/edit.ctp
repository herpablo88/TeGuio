<div class="features-container section-container">
    <div class="container">
        <section class="content-header" style="padding-top:74px">
            <ol class="breadcrumb"> <?php var_dump($usuariojr);die; ?>
               <li class="active"><a href="<?=Router::url('/preguntas',true)?>">Preguntas</a></li>
            </ol>
            <h3 class="box-title">Pregunta</h3>
        </section>
        <section class="content row">
            <div class="col-sm-12">
                <div class="box box-primary">
                <div class="box-header with-border" style="text-align: left">
                     <label for="exampleInputEmail1">Modificar pregunta</label>
                </div>
                <form role="form" action="" method="post"  enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="col-md-12">
                        <div class="form-group" style="text-align: -webkit-left;" >
                        <span>Descripcion</span>
                            <textarea type="text" class="form-control"   name="descripcion" placeholder="Descripcion"  ><?=$item[$model]['descripcion']?></textarea>
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



