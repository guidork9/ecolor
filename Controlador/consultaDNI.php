<?php
// Datos
$token = 'apis-token-1708.0wq-0xu6hnpzti4gsW09P4gIJJrRVViu';
$dni = $_REQUEST['dni'];

// Iniciar llamada a API
$curl = curl_init();
//$("#nom_completo").val(nombre+" "+apellidoPaterno+" "+apellidoMaterno);

// Buscar dni
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.apis.net.pe/v1/dni?numero=' . $dni,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 2,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'Referer: https://apis.net.pe/consulta-dni-api',
    'Authorization: Bearer ' . $token

  ),
));

$response = curl_exec($curl);
echo $response;


// curl_close($curl);
// // Datos listos para usar
// $persona = json_decode($response);
// var_dump($persona);
?>