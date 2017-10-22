<?php 
//header('Content-type: application/json');

//$texto = $_POST['texto'];
$cuerpo_de_api = array();
$cuerpo_de_api['documents']['language'] = 'es';
$cuerpo_de_api['documents']['id'] = '1';
$cuerpo_de_api['documents']['text'] = 'Hablaron del rol de la Argentina como presidente del G-20';

$output_to_ms = json_encode($cuerpo_de_api);

/*$cuerpo_de_api = " {
        'documents': [
            {
                'language': 'es',
                'id': '1',
                'text': 'Hablaron del rol de la Argentina como presidente del G-20, la educación y, sobre el final, llegó una pregunta incómoda para el Gobierno. El líder el líder de U2, Bono, lo consultó al presidente Mauricio Macri por la investigación sobre la desaparición de Santiago Maldonado.'
            }
         ]
 }";
*/
/*
$handler = curl_init("https://westeurope.api.cognitive.microsoft.com/text/analytics/v2.0/keyPhrases?Subscription-Key=2bffcc5dc60e42478b4bd4c92b177d50");
   curl_setopt($handler, CURLOPT_AUTOREFERER, true); 
   curl_setopt($handler, CURLOPT_RETURNTRANSFER, 1);
   curl_setopt($handler, CURLOPT_FOLLOWLOCATION, 1);
   curl_setopt($handler, CURLOPT_VERBOSE, 1);
   curl_setopt($handler, CURLOPT_SSL_VERIFYPEER, FALSE);
   curl_setopt($handler, CURLOPT_SSL_VERIFYHOST, FALSE);
   curl_setopt($handler, CURLOPT_POST,           1 );
   curl_setopt($handler,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.17 (KHTML, like Gecko) Chrome/24.0.1312.52 Safari/537.17');
   curl_setopt($handler, CURLOPT_POSTFIELDS,     $output_to_ms);
   //curl_setopt($handler, CURLOPT_HTTPHEADER,     array("Ocp-Apim-Subscription-Key:{2bffcc5dc60e42478b4bd4c92b177d50}"));
   curl_setopt($handler, CURLOPT_HTTPHEADER,     array('Content-Type: application/json'));
   //curl_setopt($handler, CURLOPT_HTTPHEADER,     array('Accept: application/json'));
   $response = curl_exec ($handler);
curl_close($handler);
echo $response;
*/





//ANDA SEGUN MS
//This sample uses the Apache HTTP client from HTTP Components (http://hc.apache.org/httpcomponents-client-ga/)
require_once 'C:\xampp\php\pear\HTTP\Request2.php';

$request = new Http_Request2('https://westeurope.api.cognitive.microsoft.com/text/analytics/v2.0/keyPhrases');
$url = $request->getUrl();

$headers = array(
		// Request headers
		'Content-Type' => 'application/json',
		'Ocp-Apim-Subscription-Key' => '2bffcc5dc60e42478b4bd4c92b177d50',
);

$request->setHeader($headers);

$parameters = array(
/*		'documents' => array(
							'language' => array('es'),
							'id' => array('1'),
							'text' => array('Hablaron del rol de la Argentina como presidente del G-20')
							)*/
);

$url->setQueryVariables($parameters);


$request->setMethod(HTTP_Request2::METHOD_POST);

// Request body
$request->setBody("{
        'documents': [
            {
                'language': 'es',
                'id': '1',
                'text': 'Hablaron del rol de la Argentina como presidente del G-20, la educación y, sobre el final, llegó una pregunta incómoda para el Gobierno. El líder el líder de U2, Bono, lo consultó al presidente Mauricio Macri por la investigación sobre la desaparición de Santiago Maldonado.'
            }
         ]
 }");

try
{
	$response = $request->send();
	echo $response->getBody();
}
catch (HttpException $ex)
{
	echo $ex;
}

?>