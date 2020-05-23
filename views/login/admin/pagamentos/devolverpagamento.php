<?php
$email = 'formatacaoumuarama@gmail.com';
$token = '1045640749614566A06AA642AD42B89E';

$code = $_POST['id'];

$Url="https://ws.sandbox.pagseguro.uol.com.br/v2/transactions/refunds?email=".$email."&token=".$token."&transactionCode={$code}";

$Curl=curl_init($Url);
curl_setopt($Curl,CURLOPT_HTTPHEADER,Array("Content-Type: application/x-www-form-urlencoded; charset=UTF-8"));
curl_setopt($Curl,CURLOPT_POST,true);
curl_setopt($Curl,CURLOPT_SSL_VERIFYPEER,false);
curl_setopt($Curl,CURLOPT_RETURNTRANSFER,true);
$Retorno=curl_exec($Curl);
curl_close($Curl);

$xml = json_decode(json_encode(simplexml_load_string($Retorno)));

$retorna = ['erro' => true, 'dados' => $xml];
header('Content-Type: application/json');
echo json_encode($retorna);
