
 <?php
     echo $this->Html->css('chat', array('inline' => false));
     echo $this->Html->script('chat', array('inline' => false));
 ?> 

        <!-- Top content -->
        <div class="top-content" style="position: relative; z-index: 0; background: none;">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 text wow fadeInLeft animated" style="visibility: visible; animation-name: fadeInLeft;">
                        <h1>TEGUIO</h1>
                        <div class="description" >
                            
                            <div class="chat_window">
                                <div class="top_menu">
                                    <div class="buttons">
                                        <img src="img/iconos.png"  class="iconotg img-responsive">
                                    </div>
                                      <div class="title"><i class="fa fa-comments-o" aria-hidden="true"></i>ChatBox</div></div>
                                     <ul class="messages"></ul>
                                     <div class="bottom_wrapper clearfix">
                                      <div class="message_input_wrapper">
                                        <input class="message_input" placeholder="Consulta" /></div>
                                        <div class="send_audio">
                                          <div class="icon"></div>
                                          <div class="textchat"></div>
                                        </div>
                                        <div class="send_message">
                                          <div class="icon"></div>
                                          <div class="textchat"></div>
                                        </div>

                                     </div>
                             </div>
                            <div class="message_template">
                                <li class="message">
                                    <div class="avatar"></div>
                                    <div class="text_wrapper">
                                      <div class="text"></div>
                                    </div>
                                </li>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <div class="backstretch" style="left: 0px; top: 0px; overflow: hidden; margin: 0px; padding: 0px; height: 470px; width: 100%; z-index: -999998; position: absolute;">
			<img src="img/puzzle.jpg" width="100%" style="    filter: brightness(0.8);position: absolute; margin: 0px; padding: 0px; border: none; width: 100%; height: 842px; max-height: none; max-width: none; z-index: -999999; left: 0px; top: -186px;" height="842">
		</div>

          <!-- Features -->
        <div class="features-container section-container">

	        <div class="container">
	      
	            
	            <div class="row">
	                <div class="col-sm-6 features-box wow fadeInLeft animated" style="visibility: visible; animation-name: fadeInLeft;">
	                	<div class="row">
	                		<div class="col-sm-4 features-box-icon">
	                			 <img src="<?=Router::url('/img/chatbox.png',true)?>" style="display:inline-table" class="navbar-logo img-responsive">
	                		</div>
	                		<div class="col-sm-8">
	                			<a href="http://localhost/TeGuio">
								<h3>Chatbot</h3></a>
		                    	<p>
		                    		 Qu&eacute; es un <b>Chatbot</b>? Es una ayuda virtual dedicada a interpretar y responder consultas. En nuestro caso &eacute;ste servicio se pone a disposici&oacute;n
		                    		 de los usuarios para poder responder r&aacute;pidamente ante situaciones de crisis. Contale qu&eacute; est&aacute; pasando y veamos qu&eacute; tiene para decir!
		                    	</p>
	                		</div>
	                	</div>
	                </div>
	                <div class="col-sm-6 features-box wow fadeInLeft animated" style="visibility: visible; animation-name: fadeInLeft;">
	                	<div class="row">
	                		<div class="col-sm-4 features-box-icon">
	                		   <img src="<?=Router::url('/img/historial.png',true)?>"  style="display:inline-table" class="navbar-logo img-responsive">
	                			
	                		</div>
	                		<div class="col-sm-8">
	                			<h3>Registros</h3>
		                    	<p>
		                    		Cualquier usuario registrado dispone de un seguimiento de las crisis y datos quien est&eacute; a cargo, pudiendo as&iacute; hacer un seguimiento,
		                    		control e incluso utilizar &eacute;sta informaci&oacute;n para mejorar la calidad de vida del individuo.
		                    	</p>
	                		</div>
	                	</div>
	                </div>
	            </div>
	            
	            <div class="row">
	                <div class="col-sm-6 features-box wow fadeInLeft animated" style="visibility: visible; animation-name: fadeInLeft;">
	                	<div class="row">
	                		<div class="col-sm-4 features-box-icon">
	                			<img src="<?=Router::url('/img/foro.jpg',true)?>" style="display:inline-table" class="navbar-logo img-responsive">
	                		</div>
	                		<div class="col-sm-8">
	                			<a href="http://localhost/TeGuio/foro">
								<h3>Foro</h3> </a>
		                    	<p>
		                    		 Alguna vez quisiste poder preguntar y no sab&iacute;s d&oacute;nde? Ac&aacute; armamos un esp&aacute;cio para que las personas que interact&uacute;an 
		                    		 con personas con autismo puedan intercambiar ideas, compartir opiniones y realizar consultas, pudiendo fomentar la comunicaci&oacute;n entre toda la comnunidad! 
		                    	</p>
	                		</div>
	                	</div>
	                </div>
	                <div class="col-sm-6 features-box wow fadeInLeft animated" style="visibility: visible; animation-name: fadeInLeft;">
	                	<div class="row">
	                		<div class="col-sm-4 features-box-icon">
	                			<img src="<?=Router::url('/img/cv.png',true)?>"  class="navbar-logo img-responsive" style="display:inline-table">
	                		</div>
	                		<div class="col-sm-8">
								<a href="http://localhost/TeGuio/busquedaCv">
								<h3>Bolsa de Trabajo</h3> </a>
		                    	<p>
		                    		Un lugar donde se pueden buscar personas con autismo, sus capacidades y conocimientos, ayudar a la integraci&oacute;n e inclusi&oacute;n laboral.
		                    	</p>
	                		</div>
	                	</div>
	                </div>
	            </div>

            </div>
        </div>
        
        </div>
        
      
      