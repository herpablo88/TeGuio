<!DOCTYPE html> 
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?=Configure::read('m.layout/webtitle')?></title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.5 -->
        <?php
            echo $this->Html->css('../bootstrap/css/bootstrap.min');
            echo $this->Html->css('https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css');
            echo $this->Html->css('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css');
            echo $this->Html->css('AdminLTE.min');
            echo $this->Html->css('skins/skin-green.min');
            echo $this->Html->css('jquery.growl');
            echo $this->Html->css('pace');
            echo $this->Html->css('main');
            echo $this->fetch('css');
        ?>

                 <script>
        window.baseUrl  = "<?=Router::url('/',true)?>";
        window.imgRoute = "<?=Router::url('/files/uploads/',true)?>";
        window.UrlImgThumb = "<?=Router::url('/img/thumb.png',true)?>";

               
        </script>

    </head>
    <body class="hold-transition skin-green sidebar-mini">
        <div class="wrapper">
            <?=$this->element('header')?>
            <?=$this->element('sidebar')?>
            <div class="content-wrapper" >
                <?=$this->fetch('content')?>
            </div>
            <!-- Main Footer -->
            <footer class="main-footer" >
                <!-- To the right -->
                <div class="pull-right hidden-xs">  
                    <?=date('d/m/Y H:i:s')?> 
                </div>
                <!-- Default to the left -->
                <strong>Copyright &copy; <?=date('Y')?> <a href="#"><?=Configure::read('m.layout/companyName')?></a>.</strong> All rights reserved.
            </footer>

            </div><!-- ./wrapper -->
            <?php
                  echo $this->element('modals');
          
                  echo $this->Html->script('jquery-1.10.2');
                  echo $this->Html->script('../plugins/jQuery/jQuery-2.1.4.min');
                  echo $this->Html->script('jquery-ui-1.10.4.custom');
                  echo $this->Html->script('formValidation.min.js');
                  echo $this->Html->script('bootstrapFormValidator/bootstrap.min.js');
                  echo $this->Html->script('../bootstrap/js/bootstrap.min.js');
                  echo $this->Html->script('app.min');
                  echo $this->Html->script('jquery.growl');
                  echo $this->Html->script('../plugins/pace/pace');
                  echo $this->Html->script('main');
                  echo $this->fetch('script');
                  echo $this->Session->flash();
            ?>
        </body>
    </html>



   