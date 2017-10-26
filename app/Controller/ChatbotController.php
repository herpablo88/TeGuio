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
				echo json_encode($respuesta);
				die;			   
		    }else{ 
               $respuestaCurl = $this->postCurlRequest($this->data['mensaje']);
               
			   if($respuestaCurl == false){
				//$respuesta['mensaje_resultado'] = 'No se pudo procesar el mensaje. Chequee su conexión a internet.';  
				$respuesta['mensaje_resultado'] = 'HARCODEO'; 
				echo json_encode($respuesta);
				die;		
			   }
			   
               $jsonCurl = array();
               $jsonCurl = json_decode($respuestaCurl,true);
			   
			 
			   if(count($jsonCurl['documents'][0]['keyPhrases']) == 0){
				$respuesta['mensaje_resultado'] = 'No se pudo entender el mensaje.';  
				echo json_encode($respuesta);
				die;						   
			   }
			   
			   
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
							ORDER BY coincidencias DESC,flag_medico DESC,respuestas.ranking_positivo DESC,respuestas.ranking_negativo ASC";
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
	
	//public function SetearRating($id,$comentario){
	public function SetearRating(){
		$this->autoRender = false;//Para poder devolver un json
		//Conectamos con la BD y verificamos si fall�
		$link_a_db = $this->ConnectToDB();
		
		if($link_a_db == null){
			$respuesta['mensaje_resultado'] = 'Fallo conexion con la base';
			echo json_encode($respuesta);
			die;
		}
		
		if ($this->request->is('post')) {
			$result = $link_a_db->query("UPDATE respuestas SET ranking_positivo = ranking_positivo + 1 WHERE id={$this->data['id']}");
		}else{
			$result = $link_a_db->query("UPDATE respuestas SET ranking_negativo = ranking_negativo + 1 WHERE id={$this->data['id']}");
			
			if($this->data['comentario'] != ""){
				$result = $link_a_db->query("INSERT INTO preguntas(descripcion) VALUES('{$this->data['pregunta_realizada']}')");
				$id_pregunta = $link_a_db->insert_id;
				$result = $link_a_db->query("INSERT INTO respuestas(descripcion,pk_pregunta,ranking_negativo,ranking_positivo,flag_medico)
											VALUES('{$this->data['comentario']}',{$id_pregunta},1,0,0)");
				
				$respuestaCurl = $this->postCurlRequest($this->data['pregunta_realizada']);
				 
				if($respuestaCurl == false){
					$respuesta['mensaje_resultado'] = 'No se pudo procesar el mensaje. Chequee su conexión a internet.';
					echo json_encode($respuesta);
					die;
				}
				
				$respuesta_ms_array = array();
				$respuesta_ms_array = json_decode($respuestaCurl,true);
				
				$query = "INSERT INTO keywords (fk_pregunta,palabras) VALUES ";
				
				foreach ($respuesta_ms_array['documents'][0]['keyPhrases'] as &$keyword) {
					$query = $query . "($id_pregunta,'$keyword'),";
				}
				
				$query = rtrim($query,", ");

				$link_a_db->query($query);
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
	
	//Conectar con BD
	function ConnectToDB(){
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = 'teguio';
	
		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
	
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
	
		return $conn;
	}

} 

 