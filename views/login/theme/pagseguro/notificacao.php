<?php
require_once('utils.php');

if(isset($_POST['notificationType']) && $_POST['notificationType'] == 'transaction'){

  $email = $PAGSEGURO_EMAIL;
  $token = $PAGSEGURO_TOKEN;

  $url = 'https://ws.sandbox.pagseguro.uol.com.br/v2/transactions/notifications/' . $_POST['notificationCode'] . '?email=' . $email . '&token=' . $token;

  $curl = curl_init($url);
  curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  $transaction= curl_exec($curl);
  curl_close($curl);

  if($transaction == 'Unauthorized'){
    print_r("nao autorizado");
    exit;
  }

  $xml = json_decode(json_encode(simplexml_load_string($transaction)));

  $reference = $xml->reference;
  $status = $xml->status;


  if (!empty($xml->reference)){
    $venda = (new \Source\Models\ContrataRota())->findById($xml->reference);

    $venda->status = $xml->status;
    $venda->save();
  }


}

?>