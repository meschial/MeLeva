<?php
date_default_timezone_set('America/Sao_Paulo');
$teste = true;

if ($teste){
  define("SITE", [
    "name" => "MeLeva",
    "desc" => "Envie suas encomendas com MeLeva",
    "locale" => "pt-BR",
    "root" => "https://localhost/meleva"
  ]);
  /*
 * DB CONEXÃO
 */
  define("DATA_LAYER_CONFIG", [
    "driver" => "mysql",
    "host" => "localhost",
    "port" => "3306",
    "dbname" => "tcc",
    "username" => "root",
    "passwd" => "",
    "options" => [
      PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
      PDO::ATTR_CASE => PDO::CASE_NATURAL
    ]
  ]);
}else{
  /*
 * SITE CONFIG
 */
  define("SITE", [
    "name" => "MeLeva",
    "desc" => "Envie suas encomendas com MeLeva",
    "locale" => "pt-BR",
    "root" => "https://melevaprojeto.tk"
  ]);

  /*
  * DB CONEXÃO
  */
  define("DATA_LAYER_CONFIG", [
    "driver" => "mysql",
    "host" => "localhost",
    "port" => "3306",
    "dbname" => "melevapr_tcc",
    "username" => "melevapr_tcc",
    "passwd" => "tswW+r?yCY)U",
    "options" => [
      PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
      PDO::ATTR_CASE => PDO::CASE_NATURAL
    ]
  ]);
}


define("CONF_VIEW_IMG", __DIR__ . "/../");


/*
 * SITE MINIFY
 */
if ($_SERVER["SERVER_NAME"] == "localhost"){
  require __DIR__."/Minify.php";
}
/*
 * SOCIAL CONFIG
 */
define("SOCIAL", [
  "facebook_page" => "MarcosMuriloMeschial",
  "facebook_appId" => "MarcosMuriloMeschial"
]);

/*
 * E-MAIL CONEXAO
 */
define("MAIL",[
  "host" => "smtp.sendgrid.net",
  "port" => "587",
  "user" => "apikey",
  "passwd" => "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",
  "from_name" => "Marcos",
  "from_email" => "marcosmurilo2012@hotmail.com"
]);

/*
 * FACEBOOK LOGIN
 */
define("FACEBOOK_LOGIN",[
  "clientId"          => "626209571533390",
  "clientSecret"      => "5a144630f596ae81d4c4c36ab62c7027",
  "redirectUri"       => SITE["root"]."/facebook",
  "graphApiVersion"   => "v6.0",
]);
/*
 * GOOGLE LOGIN
 */
define("GOOGLE_LOGIN",[
  "clientId"          => "19312449110-2dmi5b49u812u7lcde9qt65ub0sqqmle.apps.googleusercontent.com",
  "clientSecret"      => "9VoxKnTR99LM9nDDq03GXPI6",
  "redirectUri"       => SITE["root"]."/google",
]);