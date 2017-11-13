<div class="features-container section-container">
    <div class="container">
        <section class="content-header" style="padding-top:74px">
            <ol class="breadcrumb">
               <li class="active"><a href="<?=Router::url('/Usuariojr',true)?>">Busqueda Perfil</a></li>
            </ol>
            <h4 class="box-title">Encuentre el perfil para su puesto</h4>
        </section>
       
            <!-- Main content -->
        <section class="content ">
            <div class="separated">
              <form role="form" action="" method="post"  enctype="multipart/form-data">
               Busco Conocimientos en: <input type="text"  id="string"  name="string" >
               <button type="submit"  class="btn btn-warning btn" style="background-color: #57c3af;" >Filtrar </button>
               </form>
            </div>
            <?php if (empty($items)):

            print('<p>No hay resultados para mostrar.</p>');
            else :
            ?>
            <div class="box box-primary">
          
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <th>Listado Cv</th>
                          
                        </tr>

                        <?php foreach($items as $item): ?>
                       
                        <tr>
                        <td><?=$item[$model]['nombre_post']." ".$item[$model]['apellido_post']?></td>
                        <td><?=$item[$model]['email_post']?></td>
                        <td><?=$item[$model]['edad_post'].' años'?></td>
                        <td>
                         <span class="btn btn-warning btn-xs" action-redirect btn-controller='busquedaCv' btn-action='detalle' btn-data="<?=$item[$model]['id']?>">Ver Detalle</span>
                      
                        </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                   </table>
                </div><!-- /.box-body -->
            </div>
            <div class="box-footer clearfix">
                <ul class="pagination pagination-sm no-margin pull-right">
                <?php
                    echo $this->Paginator->counter(
                    'Pagina {:page} de {:pages}'
                    );
                    echo $this->Paginator->numbers(array('before'=>'<br />', 'tag'=>'li', 'currentTag'=>'a', 'currentClass'=>'active', 'separator'=>'', 'first' => 'First ','last' => ' Last'));
                ?>
                </ul>
            </div>
            <?php endif; ?>
        </section>
    </div>
</div>




