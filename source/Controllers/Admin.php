<?php


namespace Source\Controllers;


use http\Params;
use Source\Core\Controller;
use Source\Models\Cartao;
use Source\Models\Comentario;
use Source\Models\ContrataRota;
use Source\Models\DadosUser;
use Source\Models\Endereco;
use Source\Models\Motorista;
use Source\Models\NovaRota;
use Source\Models\User;

/**
 * Class Admin
 * @package Source\Controllers
 */
class Admin extends Controller
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
    }else{
      $admin = (new User())->findById($_SESSION["user"]);
      if ($admin->admin <> "S"){
        unset($_SESSION["user"]);
        flash("error", "Acesso negado.");
        $this->router->redirect("web.login");
      }
    }
  }


  /**
   *
   */
  public function home(): void
  {
    $head = $this->seo->optimize(
      "Bem vindo ao admin {$this->user->nome}",
      site("desc"),
      $this->router->route("app.home"),
      routeImage("home")
    )->render();

    echo $this->view->render("admin/home",[
      "head" => $head,
      "user" => $this->user
    ]);
  }


  /**
   *
   */
  public function motoristasativos()
  {
    $head = $this->seo->optimize(
      "{$this->user->nome}, todos os motoristas ativos da ". site("name"),
      site("desc"),
      $this->router->route("admin.motoristasativos"),
      routeImage("motoristasativos")
    )->render();

    echo $this->view->render("admin/usuarios/motoristasativos",[
      "head" => $head,
      "user" => $this->user,
      "motoristas" => (new Motorista())
      ->innerMotorista("motorista.ativo = :ativo", "ativo=S", " * ,motorista.ativo as mot_ativo, motorista.id as mot_id")
      ->fetch(true)
    ]);
  }

  public function desativarmotorista($data)
  {

    if (!empty($data['id'])){
      $motorista = (new Motorista())->findById($data['id']);
      $motorista->ativo = "D";
      if ($motorista->save()){
        flash("success", "Motorista desativado com sucesso!");
        echo $this->ajaxResponse("redirect", [
          "url" => $this->router->route("admin.motoristasnaoativos")
        ]);
        return;
      }
      echo $this->ajaxResponse("message",[
        "type" => "error",
        "message" => "Não foi possivel desativar o motorista!"
      ]);
      return;
    }
  }

  /**
   *
   */
  public function motoristasnaoativos()
  {
    $head = $this->seo->optimize(
      "{$this->user->nome}, todos os motoristas não ativos da ". site("name"),
      site("desc"),
      $this->router->route("admin.motoristasnaoativos"),
      routeImage("motoristasnaoativos")
    )->render();

    echo $this->view->render("admin/usuarios/motoristasnaoativos",[
      "head" => $head,
      "user" => $this->user,
      "motoristas" => (new Motorista())
        ->innerMotorista("motorista.ativo = :ativo", "ativo=N", " * ,motorista.ativo as mot_ativo, motorista.id as mot_id")
        ->fetch(true)
    ]);
  }

  public function ativarmotorista($data)
  {

    if (!empty($data['id'])){
      $motorista = (new Motorista())->findById($data['id']);
      $motorista->ativo = "S";
      if ($motorista->save()){
        flash("success", "Motorista ativo com sucesso!");
        echo $this->ajaxResponse("redirect", [
          "url" => $this->router->route("admin.motoristasnaoativos")
        ]);
        return;
      }
      echo $this->ajaxResponse("message",[
        "type" => "error",
        "message" => "Não foi possivel ativar o motorista!"
      ]);
      return;
    }
  }

  public function motoristasdesativados()
  {
    $head = $this->seo->optimize(
      "{$this->user->nome}, todos os motoristas desativados da ". site("name"),
      site("desc"),
      $this->router->route("admin.motoristasdesativados"),
      routeImage("motoristasdesativados")
    )->render();

    echo $this->view->render("admin/usuarios/motoristasdesativados",[
      "head" => $head,
      "user" => $this->user,
      "motoristas" => (new Motorista())
        ->innerMotorista("motorista.ativo = :ativo", "ativo=D",  "* ,motorista.ativo as mot_ativo, motorista.id as mot_id")
        ->fetch(true)
    ]);
  }

  public function reativarmotorista($data)
  {

    if (!empty($data['id'])){
      $motorista = (new Motorista())->findById($data['id']);
      $motorista->ativo = "S";
      if ($motorista->save()){
        flash("success", "Motorista ativo com sucesso!");
        echo $this->ajaxResponse("redirect", [
          "url" => $this->router->route("admin.motoristasdesativados")
        ]);
        return;
      }
      echo $this->ajaxResponse("message",[
        "type" => "error",
        "message" => "Não foi possivel ativar o motorista!"
      ]);
      return;
    }
  }

  public function todosmotoristas()
  {
    $head = $this->seo->optimize(
      "{$this->user->nome}, todos os motoristas da ". site("name"),
      site("desc"),
      $this->router->route("admin.todosmotoristas"),
      routeImage("todosmotoristas")
    )->render();

    echo $this->view->render("admin/usuarios/todosmotoristas",[
      "head" => $head,
      "user" => $this->user,
      "motoristas" => (new Motorista())
        ->innerMotorista()
        ->fetch(true)
    ]);
  }

  public function usuariosdesativados()
  {
    $head = $this->seo->optimize(
      "{$this->user->nome}, todos os usuários desativados da ". site("name"),
      site("desc"),
      $this->router->route("admin.usuariosdesativados"),
      routeImage("usuariosdesativados")
    )->render();

    echo $this->view->render("admin/usuarios/usuariosdesativados",[
      "head" => $head,
      "user" => $this->user,
      "usuarios" => (new User())->find("ativo = :a", "a=D")->fetch(true)
    ]);
  }

  public function ativarusuario($data)
  {
    if (!empty($data['id'])){
      $user = (new User())->findById($data['id']);
      $user->ativo = "S";
      if ($user->save()){
        flash("success", "Usuario ativado com sucesso!");
        echo $this->ajaxResponse("redirect", [
          "url" => $this->router->route("admin.usuariosdesativados")
        ]);
        return;
      }
      echo $this->ajaxResponse("message",[
        "type" => "error",
        "message" => "Não foi possivel ativar o usuario!"
      ]);
      return;
    }
  }

  public function todosusuarios()
  {
    $head = $this->seo->optimize(
      "{$this->user->nome}, todos os usuários da ". site("name"),
      site("desc"),
      $this->router->route("admin.todosusuarios"),
      routeImage("todosusuarios")
    )->render();

    echo $this->view->render("admin/usuarios/todosusuarios",[
      "head" => $head,
      "user" => $this->user,
      "usuarios" => (new User())
        ->find()
        ->fetch(true)
    ]);
  }

  public function editarUsuario()
  {
    if (!empty($_GET['id'])){
        $id = $_GET['id'];
    }else{
      $this->router->redirect('admin.todosusuarios');
    }
    $head = $this->seo->optimize(
      "{$this->user->nome}, todas as rotas canceladas da ". site("name"),
      site("desc"),
      $this->router->route("admin.editarUsuario"),
      routeImage("editarUsuario")
    )->render();

    echo $this->view->render("admin/usuarios/editarUsuario",[
      "head" => $head,
      "user" => $this->user,
      "login" => (new User())->findById($id),
      "endereco" => (new Endereco())->find("login_id = :l", "l={$id}")->fetch(true),
      "documentos" => (new DadosUser())->find("login_id = :l", "l={$id}", "*, date_format(date, '%d/%m/%Y') date")->fetch(true),
      "comentarios" => (new Comentario())->find("login_id = :l", "l={$id}")->fetch(true),
      "rotas" => (new NovaRota())->find("login_id = :l", "l={$id}", "*, date_format(data_inicio, '%d/%m/%Y') data_inicio")->fetch(true),
      "vendas" => (new ContrataRota())->find("login_id = :l", "l={$id}", "*, date_format(date, '%d/%m/%Y') date")->fetch(true),
      "motorista" => (new Motorista())->find("login_id = :l", "l={$id}")->fetch(true)
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
        "message" => "Preencha todos os campos!"
      ]);
      return;
    }

    if($data['ativo'] == "D"){
      $motorista = (new Motorista())->find("login_id = :l", "l={$data['id']}")->fetch(true);
      if ($motorista){
        foreach ($motorista as $mot){
          $id = (new Motorista())->findById($mot->id);
          $id->ativo = "D";
          $id->save();
        }
      }
    }

    $user = (new User())->findById($data['id']);
    $user->nome = $data['nome'];
    $user->sobrenome = $data['sobrenome'];
    $user->email = $data['email'];
    $user->ativo = $data['ativo'];
    if ($user->save()){
      flash("success", "Dados atualizados com sucesso!");
      echo $this->ajaxResponse("redirect", [
        "url" => $this->router->route("admin.editarUsuario", ['id'=>$data['id']])
      ]);
      return;
    }else{
      echo $this->ajaxResponse("message",[
        "type" => "error",
        "message" => "Ocorreu um erro, tente novamente!"
      ]);
      return;
    }
  }

  public function salvarMotorista(array $data): void
  {
    if (in_array("", $data)){
      echo $this->ajaxResponse("message",[
        "type" => "error",
        "message" => "Preencha todos os campos!"
      ]);
      return;
    }
    if ($data['ativo'] == "S"){
      $user = (new User())->findById($data['login_id']);
      $user->ativo = "S";
      $user->save();
    }

    if ($data['id']){
      $user = (new Motorista())->findById($data['id']);
      $user->tipo_cnh = $data["tipo_cnh"];
      $user->cnh = $data["cnh"];
      $user->ativo = $data["ativo"];

      if ($user->save()){
        flash("success", "Dados atualizados com sucesso!");
        echo $this->ajaxResponse("redirect", [
          "url" => $this->router->route("admin.editarUsuario", ['id'=>$data['login_id']])
        ]);
        return;
      }else{
        echo $this->ajaxResponse("message",[
          "type" => "danger",
          "message" => "Ocorreu um erro, tente novamente!"
        ]);
        return;
      }
    }

  }


  public function rotasandamento()
  {
    $head = $this->seo->optimize(
      "{$this->user->nome}, todas as rotas em andamento da ". site("name"),
      site("desc"),
      $this->router->route("admin.rotasandamento"),
      routeImage("rotasandamento")
    )->render();

    echo $this->view->render("admin/rotas/rotasandamento",[
      "head" => $head,
      "user" => $this->user,
      "rotas" => (new NovaRota())->find("status = :s","s=A", "*, date_format(data_inicio, '%d/%m/%Y') data_inicio")->fetch(true)
    ]);
  }

  public function todasrotas()
  {
    $head = $this->seo->optimize(
      "{$this->user->nome}, todas as rotas da ". site("name"),
      site("desc"),
      $this->router->route("admin.todasrotas"),
      routeImage("todasrotas")
    )->render();

    echo $this->view->render("admin/rotas/todasrotas",[
      "head" => $head,
      "user" => $this->user,
      "rotas" => (new NovaRota())->find("","","*, date_format(data_inicio, '%d/%m/%Y') data_inicio")->fetch(true)
    ]);
  }

  public function rotasfinalizadas()
  {
    $head = $this->seo->optimize(
      "{$this->user->nome}, todas as rotas finalizadas da ". site("name"),
      site("desc"),
      $this->router->route("admin.rotasfinalizadas"),
      routeImage("rotasfinalizadas")
    )->render();

    echo $this->view->render("admin/rotas/rotasfinalizadas",[
      "head" => $head,
      "user" => $this->user,
      "rotas" => (new NovaRota())->find("status = :s","s=F", "*, date_format(data_inicio, '%d/%m/%Y') data_inicio")->fetch(true)
    ]);
  }

  public function rotascanceladas()
  {
    $head = $this->seo->optimize(
      "{$this->user->nome}, todas as rotas canceladas da ". site("name"),
      site("desc"),
      $this->router->route("admin.rotascanceladas"),
      routeImage("rotascanceladas")
    )->render();

    echo $this->view->render("admin/rotas/rotascanceladas",[
      "head" => $head,
      "user" => $this->user,
      "rotas" => (new NovaRota())->find("status = :s","s=C", "*, date_format(data_inicio, '%d/%m/%Y') data_inicio")->fetch(true)
    ]);
  }

  public function detalherota()
  {
    if ($_GET['id']){
      $rota = (new NovaRota())->findById($_GET['id']);
    }else{
      $this->router->redirect('admin.todasrotas');
    }
    $head = $this->seo->optimize(
      "Detalhes da rota",
      site("desc"),
      $this->router->route("admin.detalherota"),
      routeImage("detalherota")
    )->render();

    echo $this->view->render("admin/rotas/detalherota",[
      "head" => $head,
      "user" => $this->user,
      "rotas" => $rota
    ]);
  }

  public function desativarota($data)
  {
    if (!empty($data['id'])){
      $rota = (new NovaRota())->findById($data['id']);
      $rota->status = "C";
      if ($rota->save()){
        flash("success", "Rota desativada com sucesso!");
        echo $this->ajaxResponse("redirect", [
          "url" => $this->router->route("admin.rotasandamento")
        ]);
        return;
      }
      echo $this->ajaxResponse("message",[
        "type" => "error",
        "message" => "Erro ao desativar rota!!"
      ]);
      return;
    }
  }

  public function todospagamentos()
  {
    $head = $this->seo->optimize(
      "Todos os pagamentos da ". site("name"),
      site("desc"),
      $this->router->route("admin.todospagamentos"),
      routeImage("todospagamentos")
    )->render();

    echo $this->view->render("admin/pagamentos/todospagamentos",[
      "head" => $head,
      "user" => $this->user,
      "vendas" => (new ContrataRota())->find("","","*, date_format(date, '%d/%m/%Y') date")->fetch(true)
    ]);
  }

  public function pagamentosandamento()
  {
    $head = $this->seo->optimize(
      "Todos os pagamentos em andamento da ". site("name"),
      site("desc"),
      $this->router->route("admin.pagamentosandamento"),
      routeImage("pagamentosandamento")
    )->render();

    echo $this->view->render("admin/pagamentos/pagamentosandamento",[
      "head" => $head,
      "user" => $this->user,
      "vendas" => (new ContrataRota())->find("status = :s","s=A","*, date_format(date, '%d/%m/%Y') date")->fetch(true)
    ]);
  }

  public function pagamentoscancelados()
  {
    $head = $this->seo->optimize(
      "Todos os pagamentos cancelados da ". site("name"),
      site("desc"),
      $this->router->route("admin.pagamentoscancelados"),
      routeImage("pagamentoscancelados")
    )->render();

    echo $this->view->render("admin/pagamentos/pagamentosandamento",[
      "head" => $head,
      "user" => $this->user,
      "vendas" => (new ContrataRota())->find("status = :s","s=C","*, date_format(date, '%d/%m/%Y') date")->fetch(true)
    ]);
  }

  public function pagamentosfinalizados()
  {
    $head = $this->seo->optimize(
      "Todos os pagamentos finalizados da ". site("name"),
      site("desc"),
      $this->router->route("admin.pagamentosfinalizados"),
      routeImage("pagamentosfinalizados")
    )->render();

    echo $this->view->render("admin/pagamentos/pagamentosandamento",[
      "head" => $head,
      "user" => $this->user,
      "vendas" => (new ContrataRota())->find("status = :s","s=F","*, date_format(date, '%d/%m/%Y') date")->fetch(true)
    ]);
  }

  public function detalhepagamento()
  {
    if ($_GET['id']){
      $rota = (new NovaRota())->findById($_GET['id']);
    }else{
      $this->router->redirect('admin.todospamentos');
    }
    $head = $this->seo->optimize(
      "Detalhes de pagamento ",
      site("desc"),
      $this->router->route("admin.detalhepagamento"),
      routeImage("detalhepagamento")
    )->render();

    echo $this->view->render("admin/pagamentos/detalhepagamento",[
      "head" => $head,
      "user" => $this->user,
      "login" => (new User())->findById($rota->login_id),
      "endereco" => (new Endereco())->find("login_id = :l", "l={$rota->login_id}")->fetch(true),
      "documentos" => (new DadosUser())->find("login_id = :l", "l={$rota->login_id}", "*, date_format(date, '%d/%m/%Y') date")->fetch(true),
      "rotas" => (new NovaRota())->find("login_id = :l", "l={$rota->login_id}", "*, date_format(data_inicio, '%d/%m/%Y') data_inicio")->fetch(true),
      "motorista" => (new Motorista())->find("login_id = :l", "l={$rota->login_id}")->fetch(true),
      "pag" => (new ContrataRota())->find("mot_id = :m AND status = :s", "m={$rota->login_id} & s=F", " *, SUM(valor) as valores")->fetch(true),
      "pagamentos" => (new ContrataRota())->find("mot_id = :m AND status = :s", "m={$rota->login_id} & s=F", "*, date_format(date, '%d/%m/%Y') date")->fetch(true),
      "conta" => (new Cartao())->find("login_id = :l", "l={$rota->login_id}")->fetch(true)

    ]);
  }

  public function pagamentosdetalhe()
  {
    if (!empty($_GET['code'])){
      $venda = (new ContrataRota())->find("code = :c", "c={$_GET['code']}")->fetch(true);
      foreach ($venda as $id){
        $user = (new User())->findById($id->login_id);
      }

    }
    $head = $this->seo->optimize(
      "Todos os pagamentos finalizados da ". site("name"),
      site("desc"),
      $this->router->route("admin.pagamentosdetalhe"),
      routeImage("pagamentosdetalhe")
    )->render();

    echo $this->view->render("admin/pagamentos/pagamentosdetalhe",[
      "head" => $head,
      "user" => $this->user,
      "login" => $user,
      "vendas" => $venda,
      "documentos" => (new DadosUser())->find("login_id = :l", "l={$id->login_id}", "*, date_format(date, '%d/%m/%Y') date")->fetch(true),
    ]);
  }

  public function cancelarpagamento()
  {

    $head = $this->seo->optimize(
      "Todos os pagamentos finalizados da ". site("name"),
      site("desc"),
      $this->router->route("admin.pagamentosdetalhe"),
      routeImage("pagamentosdetalhe")
    )->render();

    echo $this->view->render("admin/pagamentos/cancelarpagamento",[
      "head" => $head,
      "user" => $this->user
    ]);
  }

}