<?php

//Config SANDBOX or PRODUCTION environment
$SANDBOX_ENVIRONMENT = true;

$PAGSEGURO_API_URL = 'https://ws.pagseguro.uol.com.br/v2';
if($SANDBOX_ENVIRONMENT){
  $PAGSEGURO_API_URL = 'https://ws.sandbox.pagseguro.uol.com.br/v2';
}

$PAGSEGURO_EMAIL = 'formatacaoumuarama@gmail.com';
$PAGSEGURO_TOKEN = '1045640749614566A06AA642AD42B89E';

?>