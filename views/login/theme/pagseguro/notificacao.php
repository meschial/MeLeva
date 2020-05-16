<?php
require_once('utils.php');

if(isset($_POST['notificationType']) && $_POST['notificationType'] == 'transaction'){

  $email = 'formatacaoumuarama@gmail.com';
  $token = '1045640749614566A06AA642AD42B89E';

  $url = 'https://ws.sandbox.pagseguro.uol.com.br/v2/transactions/notifications/' . $_POST['notificationCode'] . '?email=' . $email . '&token=' . $token;

  $curl = curl_init($url);
  curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  $transaction= curl_exec($curl);
  curl_close($curl);

  $xml = json_decode(json_encode(simplexml_load_string($transaction)));


  if (!empty($xml->reference)){
    $venda = (new \Source\Models\ContrataRota())->findById($xml->reference);
    $venda->status = $xml->status;
    $venda->save();
  }
}

?>