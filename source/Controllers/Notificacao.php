<?php


namespace Source\Controllers;


use Source\Core\Controller;

class Notificacao extends Controller
{
  public function __construct($router)
  {
    parent::__construct($router);
  }

  public function notificacao()
  {
    echo $this->view->render("theme/pagseguro/notificacao",[
    ]);
  }
}