<?php
require_once('config.php');
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
  $xml = simplexml_load_string($transaction);

  $reference = $xml->reference;
  $status = $xml->status;

  if (!empty($status)){
    include_once 'config.php';
    $sql = "select * from venda where id = '$reference'";
    $consulta = $pdo->prepare($sql);
    $consulta->execute();
    $linha = $consulta->fetch(PDO::FETCH_OBJ);
    if($linha->reference){
      $data = [
        'status' => $status,
        'reference' => $reference,
      ];
      $sql = "UPDATE venda SET status=:status WHERE id=:reference";
      $stmt= $pdo->prepare($sql);
      $stmt->execute($data);
    }else{
      $pdo->beginTransaction();
      $sql = "insert into venda (id, status)
			values 
			(NULL, :status)";
      $consulta = $pdo->prepare( $sql );
      $consulta->bindValue(":status",$status);
      $consulta->execute();
      $pdo->commit();
    }
  }

}

?>