<?php

$email = 'formatacaoumuarama@gmail.com';
$token = '1045640749614566A06AA642AD42B89E';

$Code = json_decode($_POST['id'], true);
var_dump($Code);exit;
  $Url="https://ws.sandbox.pagseguro.uol.com.br/v2/transactions/cancels?email=".$email."&token=".$token."&transactionCode={$Code}";

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
