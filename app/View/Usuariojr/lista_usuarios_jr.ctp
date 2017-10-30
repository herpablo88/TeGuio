<div class="features-container section-container">
    <div class="container">
        <section class="content-header" style="padding-top:74px">
            <ol class="breadcrumb">
               <li class="active"><a href="<?=Router::url('/usuariojr',true)?>">UsuarioJr</a></li>
            </ol>
            <h3 class="box-title">Lista Usuarios a Cargo de <?=$usuario['User']['nombre'].' '.$usuario['User']['apellido']?></h3>
        </section>

            <!-- Main content -->
        <section class="content ">
            <div class="separated">
                <a class="btn btn-default btn-flat"  style="border-radius: 14%"href="<?=Router::url(array('action'=>'add'),true)?>"><?php echo __('+ Agregar ');?></a>
            </div>

            <?php if (empty($items)):
            print('<p>No hay resultados para mostrar.</p>');
            else :
            ?>
            <div class="box box-primary">
            <div class="box-header">
            </div><!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <th>Dni</th>
                            <th>Nombre Apellido</th>
                            <th>Visualizar Cv</th>
                        </tr>

                        <?php foreach($items as $item): ?>

                        <tr style="text-align: -webkit-left;">
                        <td><?=$item[$model]['id']?></td>
                        <td><?=$item[$model]['nombre']." ".$item[$model]['apellido']?></td>
                         
                        <td> 
                           <span class="btn btn-warning btn-xs" action-redirect btn-controller='CvsUsuarioJr' btn-action='verCv' btn-data="<?=$item[$model]['id']?>"><span class='glyphicon  glyphicon-list-alt'></span></span> 
                        </td>

                        <td>
                  
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




