<div class="features-container section-container">
    <div class="container">
        <section class="content-header" style="padding-top:74px">
            <ol class="breadcrumb">
               <li class="active"><a href="<?=Router::url('/Profesional',true)?>">Validar</a></li>
            </ol>
            <h3 class="box-title">Listado</h3>
        </section>

            <!-- Main content -->
        <section class="content ">

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
                            <th>Pregunta</th>
                            <th>Respuesta</th>
                            <th></th>
                        </tr>
                       

                        <?php var_dump($items); foreach($items as $item): ?>

                        <tr style="text-align: -webkit-left;">
                        <td><?=$item[$model]['pregunta']?></td>
                        <td><?=$item[$model]['respuesta']?></td>
                        <td>
                        <span class="btn btn-warning btn-xs" action-redirect btn-controller='usuarios' btn-action='edit' btn-data="<?=$item[$model]['id']?>"><span class='glyphicon glyphicon-ok'></span></span>
                        <span class="btn btn-warning btn-xs" action-redirect btn-controller='usuarios' btn-action='edit' btn-data="<?=$item[$model]['id']?>"><span class='glyphicon glyphicon-ok'></span></span>


                     
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




