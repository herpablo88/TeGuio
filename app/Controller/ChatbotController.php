<?php
header("Content-type: application/json");
class ChatbotController extends AppController {

  public function beforeFilter(){
    parent::beforeFilter();
    $this->loadModel('Keywords');
    $this->loadModel('Preguntas');
    $this->loadModel('Respuestas');
    $this->loadModel('Post');
  }

    public function chatbox(){
    	$this->autoRender = false;//Para poder devolver un json
    	
        if ($this->request->is('post')) {
        	$respuesta = array();
            if(!isset($this->data['mensaje'])){
			   $respuesta['mensaje_resultado'] = 'No se escribio un mensaje';              
		    }else{ 
               $respuestaCurl = $this->postCurlRequest($this->data['mensaje']);
               
               $jsonCurl = array();
               $jsonCurl = json_decode($respuestaCurl,true);
               $respuesta['palabras_claves_detectadas'] = $jsonCurl['documents'][0]['keyPhrases'];
               /*$idrespuestas = array();
              
                foreach ($jsonCurl['documents'][0]['keyPhrases'] as $string) {
               	    $idrespuestas = $this->Keywords->find('all', array('conditions' =>                             array('palabras LIKE' => "%" .$string. "%")));
                }

                foreach ($idrespuestas as $idstring) {  
                   $respuestaDescripcion = $this->Respuestas->find('all', array('conditions' =>                               array('pk_pregunta' => $idstring['Keywords']['fk_pregunta'])));
                }
               
                foreach ($respuestaDescripcion as $key => $resp) {
               	    $resultado['mensaje_resultado'] = $resp['Respuestas']['descripcion'];
               	   
                }*/

               //Armado de query:

               $query = "SELECT respuestas.id,respuestas.descripcion, count(respuestas.id) as 'coincidencias',respuestas.flag_medico
						FROM respuestas
						INNER JOIN preguntas ON preguntas.id = respuestas.pk_pregunta
						INNER JOIN keywords ON keywords.fk_pregunta = preguntas.id
						WHERE ";
	               
	               $primer_bucle = true;
	               
	               foreach ($jsonCurl['documents'][0]['keyPhrases'] as &$keyword) {
	               	if($primer_bucle){
	               		$query = $query . "keywords.palabras LIKE '%$keyword%'";
	               		$primer_bucle = false;
	               	}else{
	               		$query = $query . "OR keywords.palabras LIKE '%$keyword%'";
	               	}
	               }
	               
	               $query = $query . "GROUP BY respuestas.id
							ORDER BY flag_medico DESC,coincidencias DESC,respuestas.ranking_positivo DESC,respuestas.ranking_negativo ASC";
	                
	            //FIN armado de query:

	            $data = $this->Post->query($query);

	            if(count($data) == 0){
	            		$respuesta['mensaje_resultado'] = 'No hay soluciones posibles por el momento.';
	            		echo json_encode($respuesta);
	            		die;
	            }        
	            
	            $cantidad_de_respuestas = 1; //Setear la cantidad de respuestas deseadas
	            $contador = 0;

	            foreach ($data as &$fila) {
	            	if($contador < $cantidad_de_respuestas){
	            		$respuesta['respuesta_elegida'][$contador]['id'] = $fila['respuestas']['id'];
	            		$respuesta['respuesta_elegida'][$contador]['texto'] = $fila['respuestas']['descripcion'];
	            		$respuesta['respuesta_elegida'][$contador]['flag_medico'] = $fila['respuestas']['flag_medico'];
	            	}
	            	$contador = $contador + 1;
	            }
	            
	            $respuesta['mensaje_resultado'] = 'OK';
	            echo json_encode($respuesta);
	            die;
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

 