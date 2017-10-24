<?php

class ChatbotController extends AppController {

  public function beforeFilter(){
    parent::beforeFilter();
    $this->loadModel('Keywords');
    $this->loadModel('Preguntas');
    $this->loadModel('Respuestas');
 
  }

    public function chatbox(){

        if ($this->request->is('post')) {
         
            if(!isset($this->data['mensaje'])){

			   $resultado['mensaje_resultado'] = 'No se escribio un mensaje';
              
		    }else{ 

               $respuestaCurl = $this->postCurlRequest($this->data['mensaje']);
               
               $jsonCurl = array();
               $jsonCurl = json_decode($respuestaCurl,true);
               $idrespuestas = array();
              
                foreach ($jsonCurl['documents'][0]['keyPhrases'] as $string) {
               	    $idrespuestas = $this->Keywords->find('all', array('conditions' =>                             array('palabras LIKE' => "%" .$string. "%")));
                }

                foreach ($idrespuestas as $idstring) {  
                   $respuestaDescripcion = $this->Respuestas->find('all', array('conditions' =>                               array('pk_pregunta' => $idstring['Keywords']['fk_pregunta'])));
                }
               
                foreach ($respuestaDescripcion as $key => $resp) {
               	    $resultado['mensaje_resultado'] = $resp['Respuestas']['descripcion'];
               	   
                }

                var_dump($resultado['mensaje_resultado']);die;
		   }
		}
	}	   
				     

    //Funciones
	function postCurlRequest($texto) {

		$url = 'https://westeurope.api.cognitive.microsoft.com/text/analytics/v2.0/keyPhrases';
		
		$data = "{
	        'documents': [
	            {
	                'language': 'es',
	                'id': '1',
	                'text': '$texto'
	            }
	         ]
	        }";
   
		//$data_string = json_encode($data);

		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_POST, 0);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
				'Accept: application/json',
				'Content-Type:application/json',
				'Ocp-Apim-Subscription-Key:2bffcc5dc60e42478b4bd4c92b177d50'
		));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT ,10);
		// curl_setopt($ch, CURLOPT_TIMEOUT, TIMEOUTGETCURL);

		$output = curl_exec($ch);
		 
		$info = curl_getinfo($ch);
		curl_close($ch);
		 
		return $output;
	}

} 

 