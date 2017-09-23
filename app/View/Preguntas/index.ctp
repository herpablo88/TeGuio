<section class="content-header">
  <h1>
  
    <small>Preguntas</small>
    </h1>
   <ol class="breadcrumb">
    <!--    <li><a href="<?=Router::url('/',true)?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="<?=Router::url('/preguntas',true)?>">Preguntas</a></li>-->
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="separated"><a class="btn btn-default btn-flat" href="<?=Router::url(array('action'=>'add'),true)?>"><?php echo __('+ Agregar ');?></a></div>

    <?php if (empty($items)):
        print('<p>No hay resultados para mostrar.</p>');
        else :
    ?>
    <div class="box">
        <div class="box-header">
        
            
            </div><!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tbody><tr>
                    
                        <th>Preguntas</th>
                       
                        <th></th>
                    </tr>
                   
                    <?php foreach($items as $item): ?>
                    
                    <tr>
                        <td><?=$item[$model]['id']?></td>
                        <td><?=$item[$model]['descripcion']?></td>
                                         
                         <td>
                         
          
                        <span class="btn btn-warning btn-xs" action-redirect btn-controller='preguntas' btn-action='edit' btn-data="<?=$item[$model]['id']?>"><span class='fa fa-pencil'></span></span>


                  
                          <span class="btn btn-danger btn-xs"
                            action-modal='true'
                            modal-class='modal-danger'
                            modal-title='Eliminar Pregunta?'
                            modal-text='¿Estas seguro que deseas borrar esta pregunta?'
                            object-id="<?=$item[$model]['id']?>"
                            object-controller="preguntas"
                            ><span class='fa fa-times-circle'></span>
                        </span>
                        </td>
                     </tr>
                    <?php endforeach; ?>
                </tbody></table>
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




