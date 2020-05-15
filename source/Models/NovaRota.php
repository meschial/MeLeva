<?php


namespace Source\Models;


use CoffeeCode\DataLayer\DataLayer;
use Exception;

class NovaRota extends DataLayer
{
    public function __construct()
    {//id	quantidade	valor	cep_inicio	cep_fim	data_inicio	cidade_inicio	cidade_fim	tamahno	motorista_id
        parent::__construct("rota", ["quantidade", "valor", "cep_inicio", "cep_fim", "data_inicio", "cidade_inicio", "cidade_fim", "descricao"], "id", false);
    }

  public function contrataRota()
  {
    $status = 'A';
    return (new ContrataRota())->find("rota_id = :uid and status = :s", "uid={$this->id} & s={$status}", "*, date_format(date, '%d/%m/%Y') date")->fetch(true);
  }
}