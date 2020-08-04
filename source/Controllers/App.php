<?php


namespace Source\Controllers;

use CoffeeCode\Uploader\Image;
use Source\Core\Controller;
use Source\Models\Comentario;
use Source\Models\ContrataRota;
use Source\Models\DadosUser;
use Source\Models\Endereco;
use Source\Models\Motorista;
use Source\Models\NovaRota;
use Source\Models\User;
/**
 * Class App
 * @package Source\Controllers
 */
class App extends Controller
{
    /* @var \Source\Models\User */
    protected $user;

    /**
     * App constructor.
     * @param $router
     */
    public function __construct($router)
    {
        parent::__construct($router);

        if (empty($_SESSION["user"]) || !$this->user = (new User())->findById($_SESSION["user"])){
            unset($_SESSION["user"]);

            flash("error", "Acesso negado.");
            $this->router->redirect("web.login");
        }
        //RESTRIÇÃO DE ACESSO
    }

    /**
     *
     */
    public function meusdados()
    {
        $head = $this->seo->optimize(
            "Comentarios",
            site("desc"),
            $this->router->route("app.meusdados"),
            routeImage("meusdados")
        )->render();

        echo $this->view->render("theme/usuario/comentario",[
            "head" => $head,
            "user" => $this->user,
        ]);
    }

    /**
     * @param $data
     * @throws \Exception
     */
    public function motorista($data)
    {//id	tipo_cnh	cnh	foto	ativo	login_id
      if (!empty($data)) {
        $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);
        if (in_array("", $data)) {
          flash("info", "{$this->user->nome}, informe todos os campos!");
          $this->router->redirect("app.motorista");
          return;
        }

        $motos = (new Motorista())->find("login_id = :login_id", "login_id={$_SESSION["user"]}")->fetch(true);
        foreach ($motos as $moto) {
          $mot = ($moto->id);
          $foto = ($moto->foto);
          unlink($foto);
        }

        if ($mot) {
          $moto = (new Motorista())->findById($mot);
          $moto->tipo_cnh = $data["tipo_cnh"];
          $moto->cnh = $data["cnh"];
          $moto->ativo = "N";
        } else{
          $moto = new Motorista();
          $moto->tipo_cnh = $data["tipo_cnh"];
          $moto->cnh = $data["cnh"];
          $moto->ativo = "N";
          $moto->login_id = $_SESSION["user"];
        }
        if (!empty($_FILES)) {
          $upload = new Image("img", "motorista");
          if (!empty($_FILES["fileUpload"])) {
            $file = $_FILES["fileUpload"];
            if (empty($file["type"]) || !in_array($file["type"], $upload::isAllowed())) {
              flash("info", "{$this->user->nome}, Informe a foto da sua CNH!");
              $this->router->redirect("app.motorista");
              return;
            } else {
              $uploaded = $upload->upload($file, pathinfo($_SESSION["user"], PATHINFO_FILENAME), 1920);
              $moto->foto = $uploaded;
            }
          }
        }
        if ($moto->save()){
          flash("success", "{$this->user->nome}, Dados salvos com sucesso, aguarde validação dos dados!");
          $this->router->redirect("app.motorista");
        }else{
          flash("danger", "{$this->user->nome}, ocorreu um problema, tente novamente!");
          $this->router->redirect("app.motorista");
        }
      }

      $head = $this->seo->optimize(
        "Motoristas",
        site("desc"),
        $this->router->route("app.meusdados"),
        routeImage("meusdados")
      )->render();

      $mot = new Motorista();
      $motorista = $mot->find("login_id = :login_id", "login_id={$_SESSION["user"]}")->fetch(true);
      if ($motorista){
        foreach ($motorista as $moto){
          $userc = new \stdClass();
          $userc->tipo_cnh = $moto->tipo_cnh;
          $userc->cnh = $moto->cnh;
          $userc->foto = $moto->foto;
        }
      }else{
        $userc = new \stdClass();
        $userc->tipo_cnh = null;
        $userc->cnh = null;
        $userc->foto = null;
      }

      echo $this->view->render("theme/usuario/motorista",[
        "head" => $head,
        "user" => $this->user,
        "userc" => $userc
      ]);
    }


    /**
     *
     */
    public function iniciocliente():void
    {
        $head = $this->seo->optimize(
            "Bem vindo(a)",
            site("desc"),
            $this->router->route("app.iniciocliente"),
            routeImage("Cliente")
        )->render();

        echo $this->view->render("theme/usuario/iniciocliente",[
            "head" => $head,
            "user" => $this->user,
        ]);

    }

    /**
     *
     */
    public function rota():void
    {
        $head = $this->seo->optimize(
            "Bem vindo(a)",
            site("desc"),
            $this->router->route("app.iniciocliente"),
            routeImage("Cliente")
        )->render();

        echo $this->view->render("theme/rotas/novarota",[
            "head" => $head,
            "user" => $this->user,
        ]);

    }



  public function contratarrota():void
  {
    if ($_GET['id']){
      $rotas = (new NovaRota())->findById($_GET['id']);
    }else{
      $this->router->redirect('site.rotas');
    }
    $head = $this->seo->optimize(
      "Bem vindo(a)",
      site("desc"),
      $this->router->route("app.iniciocliente"),
      routeImage("Cliente")
    )->render();

    echo $this->view->render("theme/rotas/contratarrota",[
      "head" => $head,
      "user" => $this->user,
      "rotas" => $rotas
    ]);
  }

  public function contrata($data): void
  {
    $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);
    if (in_array("", $data)) {
      echo $this->ajaxResponse("message",[
        "type" => "error",
        "message" => "informe todos os campos!"
      ]);
      return;
    }// id	valor	date	nome	descricao	status	rota_id	login_id
    if ($data['id_rota']){
        $id_mot = (new Motorista())->find("login_id = :l", "l={$data['id_mot']}")->fetch(true);
        foreach ($id_mot as $moto){
            $motorista = $moto->id;
        }
      date_default_timezone_set('America/Sao_Paulo');
      $id = $data['id_rota'];
      $rota = (new NovaRota())->findById($id);
      $venda = (new ContrataRota());
      $venda->valor = $rota->valor;
      $venda->date = date('Y-m-d');
      $venda->nome = $data['nome'];
      $venda->descricao = $data['descricao'];
      $venda->status = '1';
      $venda->rota_id = $data['id_rota'];
      $venda->mot_id = $motorista;
      $venda->login_id = $_SESSION['user'];
      if (!empty($venda->save())){
        $dados['venda'] = $venda;
        flash("success", "{$this->user->nome}, você contratou a rota, basta fazer o pagamento!");
        echo $this->ajaxResponse("redirect",[
          "url" => $this->router->route("app.rotapagamento")
        ]);
      }else{
        flash("error", "Ocorreu um erro, tente novamente!");
        return;
      }
    }
  }

  public function rotapagamento()
  {
    $venda = (new ContrataRota())->find("login_id = :login_id", "login_id={$_SESSION["user"]}", "*, date_format(date, '%d/%m/%Y') date")->limit(1)->order('id DESC')->fetch(true);

    $head = $this->seo->optimize(
      "Bem vindo(a)",
      site("desc"),
      $this->router->route("app.iniciocliente"),
      routeImage("Cliente")
    )->render();

    echo $this->view->render("theme/rotas/rotapagamento",[
      "head" => $head,
      "user" => $this->user,
      "venda" => $venda
    ]);

  }

    public function motocancelarrota()
    {
        if (!empty($_GET['id'])){
            $id = $_GET['id'];
            $rota = (new NovaRota())->findById($id);
            $rota->status = "C";
            if ($rota->save()){
                flash("success", "{$this->user->nome}, rota cancelada com sucesso!");
                $this->router->redirect('app.rotaandamento');
            }
        }

    }

  public function rotaandamento()
  {
    $rota = "A";
    $ativo = "S";
    $rotas = (new NovaRota())->find("login_id = :login_id AND status = :status" , "login_id={$_SESSION["user"]} & status={$rota}", "*, date_format(data_inicio, '%d/%m/%Y') data_inicio")->fetch(true);
    $ativo = (new Motorista())->find("login_id = :login_id AND ativo = :ativo" , "login_id={$_SESSION["user"]} & ativo={$ativo}")->fetch(true);

    $head = $this->seo->optimize(
      "Bem vindo(a)",
      site("desc"),
      $this->router->route("app.iniciocliente"),
      routeImage("Cliente")
    )->render();

    echo $this->view->render("theme/rotas/rotaandamento",[
      "head" => $head,
      "user" => $this->user,
      "rotas" => $rotas,
      "ativo" => $ativo
    ]);

  }
    public function rotacontratada():void
    {
        $ativo = "S";
        $ativo = (new Motorista())->find("login_id = :login_id AND ativo = :ativo" , "login_id={$_SESSION["user"]} & ativo={$ativo}")->fetch(true);
        $mot = (new Motorista())->find("login_id = :l", "l={$_SESSION['user']}")->fetch(true);
        foreach ($mot as $moto){
            $motorista = $moto->id;
        }
        $rotas = (new ContrataRota())->find("mot_id = :mot_id", "mot_id={$motorista}")->fetch(true);

        $head = $this->seo->optimize(
            "Bem vindo(a)",
            site("desc"),
            $this->router->route("app.rotafinalizada"),
            routeImage("Cliente")
        )->render();

        echo $this->view->render("theme/rotas/rotacontratada",[
            "head" => $head,
            "user" => $this->user,
            "rotas" => $rotas,
            "ativo" => $ativo
        ]);

    }


    public function rotafinalizada():void
    {
        $rota = "F";
        $ativo = "S";
        $rotas = (new NovaRota())->find("login_id = :login_id AND status = :status" , "login_id={$_SESSION["user"]} & status={$rota}", "*, date_format(data_inicio, '%d/%m/%Y') data_inicio")->fetch(true);
        $ativo = (new Motorista())->find("login_id = :login_id AND ativo = :ativo" , "login_id={$_SESSION["user"]} & ativo={$ativo}")->fetch(true);

        $head = $this->seo->optimize(
            "Bem vindo(a)",
            site("desc"),
            $this->router->route("app.rotafinalizada"),
            routeImage("Cliente")
        )->render();

        echo $this->view->render("theme/rotas/rotafinalizada",[
            "head" => $head,
            "user" => $this->user,
            "rotas" => $rotas,
            "ativo" => $ativo
        ]);

    }


    /**
     *
     */
    public function rotasdisponiveis():void
    {
        $head = $this->seo->optimize(
            "Bem vindo(a)",
            site("desc"),
            $this->router->route("app.iniciocliente"),
            routeImage("Cliente")
        )->render();



        echo $this->view->render("theme/rotas/suasrotas",[
            "head" => $head,
            "user" => $this->user
        ]);

    }


    /**
     * @param $data
     * @throws \Exception
     */
    public function novarota($data):void
    {//id	quantidade	valor	cep_inicio	cep_fim	data_inicio	cidade_inicio	cidade_fim	tamahno	motorista_id

        if (!empty($data)) {
            $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);
            if (in_array("", $data)) {
                echo $this->ajaxResponse("message",[
                    "type" => "error",
                    "message" => "informe todos os campos!"
                ]);
                return;
            }

            $dt_atual = date("Y-m-d");
            if ($data["data_inicio"] < $dt_atual){
                echo $this->ajaxResponse("message",[
                    "type" => "error",
                    "message" => "A data inicio não pode ser menor que a data atual!"
                ]);
                return;
            }

            if ($data["data_inicio"] > $data["data_fim"]){
                echo $this->ajaxResponse("message",[
                    "type" => "error",
                    "message" => "A data fim não pode ser maior que a data inicio!"
                ]);
                return;
            }

            $id = (new Motorista())->find("login_id = :login_id", "login_id={$_SESSION["user"]}")->fetch(true);
            foreach ($id as $item){
                $ativo = ($item->ativo);
            }

            if ($ativo === "S"){
            $data_end = strtotime($data["data_fim"]);
            $data_dia = strtotime('+1 day', $data_end);
            $data_fim = date('Y-m-d', $data_dia);
            $start = new \DateTime($data["data_inicio"]);
            $end = new \DateTime($data_fim);
            $periodd = new \DatePeriod($start , new \DateInterval('P1D') , $end);

            $qtd = $data["quantidade"];
            $valor= $data["valor"];
            $cep_inicio = $data["cep_inicio"];
            $cep_fim = $data["cep_fim"];
            $cidade_inicio = $data["cidade_inicio"];
            $cidade_fim = $data["cidade_fim"];
            $descricao = $data["descricao"];
            $status = "A";

            foreach($periodd as $period) {
                $rota = new NovaRota();
                $data = $period->format('Y/m/d');
                $rota->quantidade = $qtd;
                $rota->valor = $valor;
                $rota->cep_inicio = $cep_inicio;
                $rota->cep_fim = $cep_fim;
                $rota->data_inicio = $data;
                $rota->cidade_inicio = $cidade_inicio;
                $rota->cidade_fim = $cidade_fim;
                $rota->descricao = $descricao;
                $rota->status = $status;
                $rota->login_id = $_SESSION["user"];
                $rota->save();
            }
                if ($rota->save()){
                    echo $this->ajaxResponse("message",[
                        "type" => "success",
                        "message" => "Deu certo!"
                    ]);
                    return;
                }else{
                    echo $this->ajaxResponse("message",[
                        "type" => "danger",
                        "message" => "Deu ruim!"
                    ]);
                    return;
                }
            }else{
              flash("alert", "{$this->user->nome}, você ainda não esta ativado como motorista!");
                $this->router->redirect('app.novarota');
            }
        }

        $ativo = (new Motorista())->find("login_id = :login_id", "login_id={$_SESSION['user']}")->fetch(true);

        $head = $this->seo->optimize(
            "Bem vindo(a)",
            site("desc"),
            $this->router->route("app.iniciocliente"),
            routeImage("Cliente")
        )->render();

        echo $this->view->render("theme/rotas/novarota",[
            "head" => $head,
            "user" => $this->user,
            "ativo" => $ativo
        ]);

    }



  public function pagamentotheme()
  {
    $head = $this->seo->optimize(
      "Bem vindo(a)",
      site("desc"),
      $this->router->route("app.pagamentotheme"),
      routeImage("Cliente")
    )->render();

    echo $this->view->render("theme/pagamentos/theme",[
      "head" => $head,
      "user" => $this->user
    ]);
  }

  public function listaderotas()
  {
    $head = $this->seo->optimize(
      "Bem vindo(a)",
      site("desc"),
      $this->router->route("app.listaderotas"),
      routeImage("Cliente")
    )->render();

    echo $this->view->render("theme/pagamentos/listaderotas",[
      "head" => $head,
      "user" => $this->user,
      "rotas" => (new ContrataRota())
        ->innerVenda("venda.status = :s AND venda.login_id = :lo","s=1  & lo={$_SESSION['user']}","*, venda.id as id_venda, date_format(data_inicio, '%d/%m/%Y') data_inicio")
        ->fetch(true)
    ]);
  }

  public function pagamentoefetuado()
  {
    $head = $this->seo->optimize(
      "Bem vindo(a)",
      site("desc"),
      $this->router->route("app.pagamentoefetuado"),
      routeImage("pagamentoefetuado")
    )->render();

    echo $this->view->render("theme/pagamentos/pagamentoefetuado",[
      "head" => $head,
      "user" => $this->user,
      "rotas" => (new ContrataRota())
        ->innerVenda("venda.login_id = :lo","lo={$_SESSION['user']}","*, venda.id as id_venda, venda.status as tipo, date_format(data_inicio, '%d/%m/%Y') data_inicio")
        ->fetch(true)
    ]);
  }

  public function detalhepagamento()
  {
    if (!empty($_GET['id'])){
      $id = (new ContrataRota())->findById($_GET['id']);
      if ($id->login_id <> $_SESSION['user']){
        $this->router->redirect('site.home');
      }
    }
    $head = $this->seo->optimize(
      "Bem vindo(a)",
      site("desc"),
      $this->router->route("app.detalhepagamento"),
      routeImage("detalhepagamento")
    )->render();

    echo $this->view->render("theme/pagamentos/detalhepagamento",[
      "head" => $head,
      "user" => $this->user,
      "rotas" => (new ContrataRota())
        ->innerVenda("venda.login_id = :lo and venda.id = :id","lo={$_SESSION['user']} & id={$id->id}","*, venda.id as id_venda, venda.status as tipo, date_format(data_inicio, '%d/%m/%Y') data_inicio")
        ->fetch(true)
    ]);
  }

  public function rotascanceladas()
  {
    $head = $this->seo->optimize(
      "Bem vindo(a)",
      site("desc"),
      $this->router->route("app.listaderotas"),
      routeImage("Cliente")
    )->render();

    echo $this->view->render("theme/pagamentos/rotascanceladas",[
      "head" => $head,
      "user" => $this->user,
      "rotas" => (new ContrataRota())
        ->innerVenda("venda.login_id = :lo","lo={$_SESSION['user']}","*, venda.id as id_venda, venda.status as tipo, date_format(data_inicio, '%d/%m/%Y') data_inicio")
        ->fetch(true)
    ]);
  }

  public function pagamentorotapagseguro()
{
  if (!empty($_GET['id'])){
    $id =($_GET['id']);
    $venda = (new ContrataRota())->findById($id);
    $rota = (new NovaRota())->findById($venda->rota_id);
  }else{
    $this->router->redirect('app.listaderotas');
  }
  $head = $this->seo->optimize(
    "Bem vindo(a)",
    site("desc"),
    $this->router->route("app.pagamentorotapagseguro"),
    routeImage("Pagamento")
  )->render();

  echo $this->view->render("theme/pagseguro/index",[
    "head" => $head,
    "user" => $this->user,
    "venda" => $venda,
    "rota" => $rota
  ]);
}

  public function postp()
  {
    echo $this->view->render("theme/pagseguro/pagamento",[

    ]);
  }

  public function finalizar()
  {

    echo $this->view->render("theme/pagseguro/proc_pag",[
    ]);

  }


  public function cancelarrota()
  {

    if (!empty($_GET['id'])){
      $id = $_GET['id'];
      $rota = (new ContrataRota())->findById($id);
      $rota->status = "C";
      if ($rota->save()){
        flash("success", "{$this->user->nome}, rota cancelada com sucesso!");
        $this->router->redirect('app.listaderotas');
      }
    }
  }

    /**
     * @param array $data
     */
    public function endereco(array $data): void
    {
        if (!empty($data)){
            $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);
            if (in_array("", $data)){
                echo $this->ajaxResponse("message",[
                    "type" => "error",
                    "message" => "informe todos os campos!"
                ]);
                return;
            }//id	cep	rua	complemento	bairro	cidade	estado	numero	usuario_id
          if (!empty($data['id'])){
            $end = (new Endereco())->findById($data['id']);
            $end->cep = $data["cep"];
            $end->rua = $data["rua"];
            $end->complemento = $data["complemento"];
            $end->bairro = $data["bairro"];
            $end->cidade = $data["cidade"];
            $end->estado = $data["estado"];
            $end->numero = $data["numero"];
          }else{
            $end = new Endereco();
            $end->cep = $data["cep"];
            $end->rua = $data["rua"];
            $end->complemento = $data["complemento"];
            $end->bairro = $data["bairro"];
            $end->cidade = $data["cidade"];
            $end->estado = $data["estado"];
            $end->numero = $data["numero"];
            $end->login_id = $_SESSION["user"];
          }
            if ($end->save()){
              echo $this->ajaxResponse("message", [
                "type" => "success",
                "message" => "Endereço salvo!!"
              ]);
              return;
            }else{
                echo $this->ajaxResponse("message", [
                    "type" => "error",
                    "message" => $end->fail()->getMessage()
                ]);
                return;
            }
        }

        $head = $this->seo->optimize(
            "Cadastro de endereço",
            site("desc"),
            $this->router->route("app.endereco"),
            routeImage("Endereço")
        )->render();

        $end = new Endereco();
        $endereco = $end->find("login_id = :login_id", "login_id={$_SESSION["user"]}")->fetch(true);
        if ($endereco){
            foreach ($endereco as $item){
                $end = new \stdClass();
                $end->id = $item->id;
                $end->cep = $item->cep;
                $end->rua = $item->rua;
                $end->complemento = $item->complemento;
                $end->bairro = $item->bairro;
                $end->numero = $item->numero;
                $end->cidade = $item->cidade;
                $end->estado = $item->estado;
            }
        }else{
            $end = new \stdClass();
            $end->cep = null;
            $end->rua = null;
            $end->complemento = null;
            $end->bairro = null;
            $end->numero = null;
            $end->cidade = null;
            $end->estado = null;
        }

        echo $this->view->render("theme/usuario/endereco",[
            "head" => $head,
            "user" => $this->user,
            "end" => $end
        ]);
    }

  /**
   * @param array $data
   */
  public function salvarlogin(array $data): void
  {
    if (in_array("", $data)){
      echo $this->ajaxResponse("message",[
        "type" => "error",
        "message" => "informe todos os campos!"
      ]);
      return;
    }

    $user = (new User())->findById($data['id']);
    $user->nome = $data['nome'];
    $user->save();
  }

    /**
     *
     */
    public function cartao()
    {
        $head = $this->seo->optimize(
            "Comentarios",
            site("desc"),
            $this->router->route("app.comentario"),
            routeImage("Comentario")
        )->render();

        echo $this->view->render("theme/usuario/cartao",[
            "head" => $head,
            "user" => $this->user,
        ]);
    }



    /**
     * @param array $data
     */
    public function comentario(array $data):void
    {
        if (!empty($data)){
            $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);
            if (in_array("", $data)){
                echo $this->ajaxResponse("message",[
                    "type" => "error",
                    "message" => "informe todos os campos!"
                ]);
                return;
            }//	id	titulo	texto	date    foto	usuario_id
            $foto = (new User())->find("id = :id", "id={$_SESSION["user"]}")->fetch(true);

            foreach ($foto as $item){
                $foto = ($item->foto);
                $nome = ($item->nome);
            }
            if (empty($foto)){
                $foto = "https://gclaw.com.br/wp-content/themes/tema-gclaw-2017/assets/images/sem-foto.jpg";
            }
            $com = new Comentario();
            $com->titulo = $data["titulo"];
            $com->texto = $data["texto"];
            $com->nome = $nome;
            $com->foto = $foto;
            $com->login_id = $_SESSION["user"];
            $com->save();
            if (!$com->save()){
                echo $this->ajaxResponse("message", [
                    "type" => "error",
                    "message" => $com->fail()->getMessage()
                ]);
                return;
            }else{
                flash("success", "Olá {$nome}, sua opnião foi registrada com sucesso!");
                echo $this->ajaxResponse("redirect", [
                    "url" => $this->router->route("app.comentario")
                ]);
                return;
            }
        }
        //id	titulo	texto	date    foto	usuario_id
        $head = $this->seo->optimize(
            "Comentarios",
            site("desc"),
            $this->router->route("app.comentario"),
            routeImage("Comentario")
        )->render();

        echo $this->view->render("theme/usuario/comentario",[
            "head" => $head,
            "user" => $this->user,
        ]);

    }

    /**
     *
     */
    public function home(array $data): void
    {
        if (!empty($data)){
            $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);
            if (in_array("", $data)){
                echo $this->ajaxResponse("message",[
                    "type" => "error",
                    "message" => "Informe todos os campos!"
                ]);
                return;
            }

            if (!empty($data['id'])){
                $user = (new DadosUser())->findById($data['id']);
                $user->cpf = $data["cpf"];
                $user->rg = $data["rg"];
                $user->date = $data["date"];
                $user->celular = $data["celular"];
                $user->save();

                if ($user->save()){
                  echo $this->ajaxResponse("message", [
                    "type" => "success",
                    "message" => "Endereço salvo!"
                  ]);
                  return;
                }else{
                    echo $this->ajaxResponse("message", [
                        "type" => "error",
                        "message" => $user->fail()->getMessage()
                    ]);
                    return;
                }
            }else{
                //cpf	rg	date	tipo	celular	ativo	login_id
                $user = new DadosUser();
                $user->cpf = $data["cpf"];
                $user->rg = $data["rg"];
                $user->date = $data["date"];
                $user->celular = $data["celular"];
                $user->login_id = $_SESSION["user"];
                $user->save();

                if ($user->save()){
                    flash("success", "{$this->user->nome}, Seus dados foram salvos!");

                    echo $this->ajaxResponse("redirect",[
                        "url" => $this->router->route("app.documentos")
                    ]);
                    return;
                }else{
                    echo $this->ajaxResponse("message", [
                        "type" => "error",
                        "message" => $user->fail()->getMessage()
                    ]);
                    return;
                }
            }
        }

        $head = $this->seo->optimize(
            "Bem vindo(a) {$this->user->nome} | ". site("name"),
            site("desc"),
            $this->router->route("app.home"),
            routeImage("Conta de {$this->user->nome}"),
            )->render();

        $login_id = $_SESSION["user"];
            $user = new DadosUser();
            $userss = $user->find("login_id = :login_id", "login_id={$login_id}")->fetch(true);
        if ($userss){
            foreach ($userss as $teste){
                $userc = new \stdClass();
                $userc->id = $teste->id;
                $userc->cpf = $teste->cpf;
                $userc->rg = $teste->rg;
                $userc->date = $teste->date;
                $userc->celular = $teste->celular;
            }
        }else{
            $userc = new \stdClass();
            $userc->cpf = null;
            $userc->rg = null;
            $userc->date = null;
            $userc->celular = null;
        }
        echo $this->view->render("theme/usuario/documentos",[
            "head" => $head,
            "user" => $this->user,
            "userc" => $userc
        ]);
    }

    /**
     *Sair
     */
    public function logoff(): void
    {
        unset($_SESSION["user"]);

        flash("info", "Você saiu com sucesso, volte logo {$this->user->nome}!");
        $this->router->redirect("web.login");

    }
}