<div class="features-container section-container">
    <div class="container">
        <section class="content-header" style="padding-top:74px">
            <ol class="breadcrumb">
               <li class="active"><a href="<?=Router::url('/Profesional',true)?>">Validar</a></li>
            </ol>
            <h3 class="box-title">Listado de Respuestas a Validar</h3>
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
                                       

                        <?php foreach($items as $item):   ?>
                          
                        <tr style="text-align: -webkit-left;">
                        <td><strong style="color:darkmagenta;"><?=strtoupper($item['Preguntas']['descripcion'])?></strong></td>
                            
                            <?php foreach($item['Preguntas']["respuestas"] as $resp):  ?>
                             <tr style="text-align: -webkit-left;">
                               <td>
                               <?=$resp['Respuestas']['descripcion']?>
                               <td> 
                               <span class="btn btn-warning btn-sm" style="
                                    background-color: green;
                                " action-redirect btn-controller='usuarios' btn-action='edit' btn-data="<?=$resp['Respuestas']['id']?>"><span class='glyphicon glyphicon-thumbs-up'></span></span>
                                <span class="btn btn-danger btn-sm" action-redirect btn-controller='usuarios' btn-action='edit' btn-data="<?=$resp['Respuestas']['id']?>"><span class='glyphicon glyphicon-thumbs-down'></span></span>
                             </tr>  
                               
                                 </td>
                               </td>
                            <?php endforeach; ?>
                       
                        
                     
                        </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                   </table>
                </div><!-- /.box-body -->
            </div>
      
            <?php endif; ?>
        </section>
    </div>
</div>




