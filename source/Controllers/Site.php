<?php


namespace Source\Controllers;


use CoffeeCode\Paginator\Paginator;
use Source\Core\Controller;
use Source\Models\Comentario;
use Source\Models\Faq\Cliente;
use Source\Models\Motorista;
use Source\Models\NovaRota;
use Source\Models\User;

class Site extends Controller
{
    protected $user;
    public function __construct($router)
    {
        parent::__construct($router);

        if (empty($_SESSION["user"]) || !$this->user = (new User())->findById($_SESSION["user"])){

        }
    }


    public function inicio()
    {
        $head = $this->seo->optimize(
            "Bem vindo ao".site("name"),
            site("desc"),
            $this->router->route("site.inicio"),
            routeImage("Inicio")
        )->render();

        echo $this->view->render("theme/inicio",[
           "head" => $head,
            "user" =>$this->user,
            "con" => (new Comentario())
            ->find("","","titulo, texto, nome, foto")
            ->order("RAND()")
            ->limit(3)
            ->fetch(true)
        ]);
    }

  public function politica()
  {
    $head = $this->seo->optimize(
      "Bem vindo a Politica do".site("name"),
      site("desc"),
      $this->router->route("site.politica"),
      routeImage("Politica")
    )->render();

    echo $this->view->render("theme/usuario/politica",[
      "head" => $head,
      "user" =>$this->user
    ]);
  }
  public function termos()
  {
    $head = $this->seo->optimize(
      "Bem vindo a Termos do".site("name"),
      site("desc"),
      $this->router->route("site.termos"),
      routeImage("Termos")
    )->render();

    echo $this->view->render("theme/usuario/termos",[
      "head" => $head,
      "user" =>$this->user
    ]);
  }


    /**
     *
     */
    public function rotas(): void
    {
        $head = $this->seo->optimize(
            "Bem vindo(a)",
            site("desc"),
            $this->router->route("app.iniciocliente"),
            routeImage("Cliente")
        )->render();

        echo $this->view->render("theme/rotas",[
            "head" => $head,
            "user" => $this->user,
            "rotas" => (new NovaRota())
            ->find("status = :status","status=A", "* ,date_format(data_inicio, '%d/%m/%Y') data_inicio")
            ->fetch(true)
        ]);
    }

    public function buscarotas($data): void
    {
        if (!empty($data)){
            $origem = $data['origem'];
            $destino = $data['destino'];
            $dete = $data['dete'];
            $rotas = (new NovaRota())->find("cep_inicio = :inicio AND cep_fim = :fim AND data_inicio = :data", "inicio={$origem} & fim={$destino} & data={$dete}")->fetch(true);
        }else{
            $this->router->redirect("site.rotas");
        }
        $head = $this->seo->optimize(
            "Bem vindo(a)",
            site("desc"),
            $this->router->route("app.iniciocliente"),
            routeImage("Cliente")
        )->render();

        echo $this->view->render("theme/buscarotas",[
            "head" => $head,
            "user" => $this->user,
            "rotas" => $rotas
        ]);
        return;
    }

    public function quemsomos(){
        $head = $this->seo->optimize(
            "Bem vindo(a)",
            site("desc"),
            $this->router->route("app.iniciocliente"),
            routeImage("Cliente")
        )->render();

        echo $this->view->render("theme/quemsomos",[
            "head" => $head,
            "user" => $this->user
        ]);

    }
    public function contato(){
        $head = $this->seo->optimize(
            "Bem vindo(a)",
            site("desc"),
            $this->router->route("app.iniciocliente"),
            routeImage("Cliente")
        )->render();

        echo $this->view->render("theme/contato",[
            "head" => $head,
            "user" => $this->user
        ]);
    }
}