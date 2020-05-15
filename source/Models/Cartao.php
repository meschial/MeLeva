<?php


namespace Source\Models;


use CoffeeCode\DataLayer\DataLayer;

class Cartao extends DataLayer
{
  public function __construct()
  {
    parent::__construct("cartao", ['nome', 'cpf', 'agencia'], 'id', false);
  }
}