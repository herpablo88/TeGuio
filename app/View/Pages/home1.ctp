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
                                      <div class="title">ChatBox</div></div>
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
        <div class="backstretch" style="left: 0px; top: 0px; overflow: hidden; margin: 0px; padding: 0px; height: 470px; width: 1263px; z-index: -999998; position: absolute;"><img src="img/puzzle.jpg" width="1263" style="    filter: brightness(0.8);position: absolute; margin: 0px; padding: 0px; border: none; width: 1263px; height: 842px; max-height: none; max-width: none; z-index: -999999; left: 0px; top: -186px;" height="842"></div>

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
                                <h3>Chatbox</h3>
                                <p>
                                     breve explicacion.
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
                                    breve explicacion.
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
                                <h3>Foro</h3>
                                <p>
                                     breve explicacion.
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
                                <h3>Bolsa de Trabajo</h3>
                                <p>
                                    breve explicacion. 
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        
        </div>
        
      
      1