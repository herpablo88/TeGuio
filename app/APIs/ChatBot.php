<?php 
//Recibe el texto a analizar con la variable 'mensaje' sea por POST o GET y devuelve un JSON


header('Content-type: application/json');

$respuesta = array();
$respuesta['mensaje_resultado'] = '';
$respuesta['mensaje_error'] = '';
/*Estructura de cada respuesta:
$respuesta['respuesta_elegida'][0]['id'] = '';
$respuesta['respuesta_elegida'][0]['texto'] = '';
$respuesta['respuesta_elegida'][0]['flag_medico'] = '';*/
$respuesta['palabras_claves_detectadas'] = '';

if(!isset($_REQUEST['mensaje'])){
	$respuesta['mensaje_resultado'] = 'No se escribio un mensaje';
	echo json_encode($respuesta);
	die;
}

$respuesta_ms = postCurlRequest($_REQUEST['mensaje']);
$respuesta_ms_array = array();
$respuesta_ms_array = json_decode($respuesta_ms,true);

//echo $respuesta_ms_array['documents'][0]['keyPhrases'][0];
//var_dump($respuesta_ms_array);die;

$respuesta['palabras_claves_detectadas'] = $respuesta_ms_array['documents'][0]['keyPhrases'];

//Formato hasta este punto... 
//Array ( [documents] => Array ( [0] => Array ( [keyPhrases] => Array ( [0] => hola ) [id] => 1 ) ) [errors] => Array ( ) ) 

//Conectamos con la BD y verificamos si falló
$link_a_db = ConnectToDB();

if($link_a_db == null){
	$respuesta['mensaje_resultado'] = 'Fallo conexion con la base';
	echo json_encode($respuesta);
	die;
}

//Armamos la query para comprar lo que nos mandaron con lo que tenemos
/*Ejemplo de cómo tiene que quedar:
SELECT respuestas.id,respuestas.descripcion, count(respuestas.id) as 'coincidencias',respuestas.flag_medico
FROM respuestas
INNER JOIN preguntas ON preguntas.id = respuestas.pk_pregunta
INNER JOIN keywords ON keywords.fk_pregunta = preguntas.id
WHERE keywords.palabras LIKE '%sierras%'
OR keywords.palabras LIKE '%hijo%'
GROUP BY respuestas.id
ORDER BY flag_medico DESC,coincidencias DESC,respuestas.ranking_positivo DESC,respuestas.ranking_negativo ASC
*/

$query = "SELECT respuestas.id,respuestas.descripcion, count(respuestas.id) as 'coincidencias',respuestas.flag_medico
			FROM respuestas
			INNER JOIN preguntas ON preguntas.id = respuestas.pk_pregunta
			INNER JOIN keywords ON keywords.fk_pregunta = preguntas.id
			WHERE ";

$primer_bucle = true;

foreach ($respuesta_ms_array['documents'][0]['keyPhrases'] as &$keyword) {
	if($primer_bucle){
    	$query = $query . "keywords.palabras LIKE '%$keyword%'";
    	$primer_bucle = false;
	}else{
		$query = $query . "OR keywords.palabras LIKE '%$keyword%'";
	}
}

$query = $query . "GROUP BY respuestas.id
					ORDER BY flag_medico DESC,coincidencias DESC,respuestas.ranking_positivo DESC,respuestas.ranking_negativo ASC";

//Pasamos a la ejecucion
$result = $link_a_db->query($query);

if($result->num_rows == 0){
	$respuesta['mensaje_resultado'] = 'No hay respuestas para ese problema';
	echo json_encode($respuesta);
	die;
}

$cantidad_de_respuestas = 1; //Setear la cantidad de respuestas deseadas
$contador = 0;

while (($fila = $result->fetch_assoc()) && ($contador < $cantidad_de_respuestas)) {
	$respuesta['respuesta_elegida'][$contador]['id'] = $fila['id'];
	$respuesta['respuesta_elegida'][$contador]['texto'] = $fila['descripcion'];
	$respuesta['respuesta_elegida'][$contador]['flag_medico'] = $fila['flag_medico'];
	$contador = $contador + 1;
}

$respuesta['mensaje_resultado'] = 'OK';
echo json_encode($respuesta);
die;


//Funciones
function postCurlRequest($texto) {

	$texto = utf8_encode($texto); //se sacan caracteres raros
	
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
?>