<?php

require_once('configuracao.php');
require_once('utils.php');

if(isset($_POST['notificationType']) && $_POST['notificationType'] == 'transaction'){

  $email = $PAGSEGURO_EMAIL;
  $token = $PAGSEGURO_TOKEN;

  $url = 'https://ws.sandbox.pagseguro.uol.com.br/v2/transactions/notifications/' . $_POST['notificationCode'] . '?email=' . $email . '&token=' . $token;

  $curl = curl_init($url);
  curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  $transaction= curl_exec($curl);
  curl_close($curl);

  if($transaction == 'Unauthorized'){
    print_r("nao autorizado");
    exit;
  }
  $transaction = simplexml_load_string($transaction);

  $status = $transaction->status;
  $idPedido = $transaction->reference;


  if (!empty($xml->reference)){
    $venda = (new \Source\Models\ContrataRota())->findById($idPedido);
    $venda->status = $status;
    $venda->save();
  }


}

?>