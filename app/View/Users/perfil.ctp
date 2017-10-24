<div class="features-container section-container">
    <div class="container">
        <section class="content-header" style="padding-top:74px">
            <ol class="breadcrumb">
               <li class="active"><a href="<?=Router::url('/users',true)?>">Perfil</a></li>
            </ol>
            <h3 class="box-title">Mi Perfil</h3>
        </section>
        <section class="content row">
            <div class="col-sm-12">
                <div class="box box-primary">
                <div class="box-header with-border" style="text-align: center">
                     <label for="exampleInputEmail1">VER/CARGAR PERSONAS A CARGO</label>

                        <span class="btn btn-warning btn-xs" action-redirect btn-controller='usuariojr' btn-action='index' btn-data="<?=$item[$model]['id']?>"><span class='glyphicon glyphicon-user'></span></span>
                </div>
                <form role="form" action="" method="post"  enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="col-md-12">

                            <div class="form-group" style="text-align:-webkit-left;" >
                                <label for="exampleInputEmail1">DNI <?=$item[$model]['id']?></label>
                            </div>

                            <div class="form-group" style="text-align:-webkit-left;" >
                                <span>Nombre</span>
                                <input type="text" class="form-control"  value="<?=$item[$model]['nombre']?>"  name="nombre" placeholder="Descripcion"  ></input>
                            </div>

                            <div class="form-group" style="text-align:-webkit-left;" >
                                <span>Apellido</span>
                                <input type="text" class="form-control" value="<?=$item[$model]['apellido']?>"  name="apellido" placeholder="Descripcion"  ></input>
                            </div>

                            <div class="form-group" style="text-align:-webkit-left;" >
                                <span>Email</span>
                                <input type="text" class="form-control"  value="<?=$item[$model]['email']?>" name="email" placeholder="Descripcion"  ></input>
                            </div>

                           <!-- <div class="form-group" style="text-align:-webkit-left;" >
                                <span>Contraseña</span>
                                <input type="text" class="form-control"   name="password" placeholder="Descripcion" value="<?=$item[$model]['password']?>" ></input>
                            </div> 
                             <div class="form-group" style="text-align:-webkit-left;" >
                                <span>Tipo</span>
                                <select class="form-control" id="fk_tipo" name="fk_tipo">
                                <?php $tipo_selected = ''; ?>
                                <option value="">Seleccione tipo</option>
                                <?php foreach ($tipos  as $key => $tipo) { ?>   

                                    <?php  if($tipo['Tipos']['id'] == $item[$model]['fk_tipo']){
                                            $tipo_selected = 'selected';
                                        }else{
                                                $tipo_selected = '';
                                            } ?>
                                    <option <?php echo $tipo_selected; ?> value="<?php echo $tipo['Tipos']['id']; ?>">
                                    <?php echo $tipo['Tipos']['descripcion']; ?></option>
                                <?php } ?> 
                                </select>
                            </div> -->

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



