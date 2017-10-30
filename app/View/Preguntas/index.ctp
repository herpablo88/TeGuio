<div class="features-container section-container">
    <div class="container">
        <section class="content-header" style="padding-top:74px">
            <ol class="breadcrumb">
               <li class="active"><a href="<?=Router::url('/preguntas',true)?>">Historico</a></li>
            </ol>
            <h3 class="box-title">Historico</h3>
        </section>
       
            <!-- Main content -->
        <section class="content ">
            <div class="separated">
                <a class="btn btn-default btn-flat"  style="border-radius: 14%"href="<?=Router::url(array('action'=>'add'.'/'.$usuariojr["Usuariojr"]["id"].'/'.$user["id"]),true)?>"><?php echo __('+ Agregar ');?></a>
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
                            <th>Listado Factor de Crisis</th>
                            <th></th>
                        </tr>

                        <?php foreach($items as $item): ?>

                        <tr>
                        <td><?=$item[$model]['id']?></td>
                        <td><?=$item[$model]['descripcion']?></td>

                        <td>
                        <span class="btn btn-warning btn-xs" action-redirect btn-controller='preguntas' btn-action='edit' btn-data="<?=$item[$model]['id'].'/'.$usuariojr["Usuariojr"]["id"]?>"><span class='fa fa-pencil'></span></span>

                         <span class="btn btn-warning btn-xs" style="background-color: #57c3af;" action-redirect btn-controller='preguntas' btn-action='respuestas' btn-data="<?=$item[$model]['id'].'/'.$usuariojr["Usuariojr"]["id"]?>">Añadir Solucion <span class='glyphicon glyphicon-list-alt'></span></span>


                        <span class="btn btn-danger btn-xs"
                        action-modal='true'
                        modal-class='modal-danger'
                        modal-title='Eliminar Factor de Crisis?'
                        modal-text='¿Estas seguro que deseas borrar este factor?'
                        object-id="<?=$item[$model]['id'].'/'.$usuariojr["Usuariojr"]["id"]?>"
                        object-controller="preguntas"
                        ><span class='fa fa-times-circle'></span>
                        </span>
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




