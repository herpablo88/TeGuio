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
            echo $this->Html->css('css');
            echo $this->Html->css('bootstrap.min.css');
            echo $this->Html->css('font-awesome.min.css');
            echo $this->Html->css('animate');
            echo $this->Html->css('style.css');
            echo $this->Html->css('Footer-with-logo.css');
			   		
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

       <link rel="shortcut icon" href="<?=Router::url('/img/icon.png',true)?>">
    
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
            <div class="content-wrapper" style="margin-left: 0px;" >
                <?=$this->fetch('content')?>
            </div>

            <!-- Main Footer -->
              <!-- Footer -->
			    <footer id="myFooter">
			        <div class="container">
			            <div class="row">
			                <div class="col-sm-3">
			                    <h5>Desarrolladores</h5>
			                    <ul>
			                        <li><a href="#">Karina Obermeier</a></li>
			                        <li><a href="#">Rocio Bravo</a></li>
			                        <li><a href="#">Pablo Hernandez</a></li>
			                    </ul>
			                </div>
			                <div class="col-sm-3">
			                    <h5>Datos &uacute;tiles</h5>
			                    <ul>
			                        <li><a href="http://scielo.sld.cu/scielo.php?script=sci_arttext&pid=S1561-31942015000100019">Autismo: un acercamiento hacia el diagn&oacute;stico y la gen&eacute;tica</a></li>
			                        <li><a href="http://www.lanacion.com.ar/1919944-autismo-en-la-escuela-ya-se-puede-hablar-de-inclusion">Autismo en la escuela: ya se puede hablar de inclusi&oacute;n?</a></li>
			                    </ul>
			                </div>
			                <div class="col-sm-3">
			                    <h5>ONG's</h5>
			                    <ul>
			                        <li><a href="http://apadea.org.ar/">Apadea</a></li>
			                        <li><a href="http://www.panaacea.org/">Panaacea</a></li>
			                        <li><a href="http://www.brincar.org.ar/">Brincar</a></li>
			                    </ul>
			                </div>
			                <div class="col-sm-3 info">
			                    <h5>Contactanos</h5>
			                    <p>teguioautismo@gmail.com</p>
			                </div>
			            </div>
			        </div>
			        <div class="second-bar">
			           <div class="container">
			                <h2 class="logo"><a href="#"> TeGuio </a></h2>
			                <div class="social-icons">
			                    <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
			                    <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
			                    <a href="#" class="google"><i class="fa fa-google-plus"></i></a>
			                </div>
			            </div>
			        </div>
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



