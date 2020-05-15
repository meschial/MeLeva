<?php


namespace Source\Models;


use CoffeeCode\DataLayer\DataLayer;

class ContrataRota extends DataLayer
{
  public function __construct()
  {
    parent::__construct('venda', ['nome', 'descricao'], 'id', false);
  }

  public function addRota(NovaRota $rota, string $nome, string $date, string $descricao, string $status): ContrataRota
  {
    $this->rota_id = $rota->id;
    $this->nome = $nome;
    $this->date = $date;
    $this->descricao = $descricao;
    $this->status = $status;

    return $this;
  }
}