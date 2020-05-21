<?php
ob_start();
session_start();

require __DIR__."/vendor/autoload.php";

use CoffeeCode\Router\Router;

$router = new Router(site());

$router->namespace("Source\Controllers");
/*
 * SITE ABERTO
 */
$router->group(null);
$router->get("/", "Site:inicio", "site.inicio");
$router->get("/rotas", "Site:rotas", "site.rotas");

$router->group("/admin");
$router->get("/", "Admin:home", "admin.home");
$router->get("/motoristasativos", "Admin:motoristasativos", "admin.motoristasativos");
$router->get("/motoristasnaoativos", "Admin:motoristasnaoativos", "admin.motoristasnaoativos");
$router->get("/motoristasdesativados", "Admin:motoristasdesativados", "admin.motoristasdesativados");
$router->get("/todosmotoristas", "Admin:todosmotoristas", "admin.todosmotoristas");
$router->get("/usuariosdesativados", "Admin:usuariosdesativados", "admin.usuariosdesativados");
$router->get("/todosusuarios", "Admin:todosusuarios", "admin.todosusuarios");
$router->get("/rotasfinalizadas", "Admin:rotasfinalizadas", "admin.rotasfinalizadas");
$router->get("/rotasandamento", "Admin:rotasandamento", "admin.rotasandamento");
$router->get("/rotascanceladas", "Admin:rotascanceladas", "admin.rotascanceladas");
$router->get("/todasrotas", "Admin:todasrotas", "admin.todasrotas");
$router->get("/pagamentosandamento", "Admin:pagamentosandamento", "admin.pagamentosandamento");
$router->get("/pagamentoscancelados", "Admin:pagamentoscancelados", "admin.pagamentoscancelados");
$router->get("/pagamentosfinalizados", "Admin:pagamentosfinalizados", "admin.pagamentosfinalizados");
$router->get("/todospagamentos", "Admin:todospagamentos", "admin.todospagamentos");

$router->get("/detalhepagamento", "Admin:detalhepagamento", "admin.detalhepagamento");

//ROTAS GET COM ID
$router->get("/editarusuario", "Admin:editarUsuario", "admin.editarUsuario");
$router->get("/detalherota", "Admin:detalherota", "admin.detalherota");
//PASSANDO ID NA ROTA GET
$router->get("/desativarmotorista", "admin:desativarmotorista", "admin.desativarmotorista");

$router->post("/reativarmotorista", "admin:reativarmotorista", "admin.reativarmotorista");

$router->get("/ativarmotorista", "admin:ativarmotorista", "admin.ativarmotorista");
$router->get("/ativarusuario", "admin:ativarusuario", "admin.ativarusuario");
$router->get("/desativarota", "admin:desativarota", "admin.desativarota");




$router->post("/salvarMotorista", "Admin:salvarMotorista", "admin.salvarMotorista");
$router->post("/salvarlogin", "admin:salvarlogin", "admin.salvarlogin");





/*
 * PROTEGIDOS GET
 */
$router->group("/noti");
$router->get("/notificacao", "Notificacao:notificacao", "app.noti");
$router->post("/notificacao", "Notificacao:notificacao", "app.noti");

$router->group("/me");
$router->get("/", "App:iniciocliente", "app.iniciocliente");
$router->get("/documentos", "App:home", "app.home");
$router->get("/endereco", "App:endereco", "app.endereco");
$router->get("/comentario", "App:comentario", "app.comentario");
$router->get("/cartao", "App:cartao", "app.cartao");
$router->get("/meusdados", "App:meusdados", "app.meusdados");
$router->get("/motorista", "App:motorista", "app.motorista");
$router->get("/rota", "App:rota", "app.rota");
$router->get("/novarota", "App:novarota", "app.novarota");
$router->get("/suasrotas", "App:suasrotas", "app.suasrotas");
$router->get("/contratarrota", "App:contratarrota", "app.contratarrota");
$router->get("/rotapagamento", "App:rotapagamento", "app.rotapagamento");
$router->get("/pagamentotheme", "App:pagamentotheme", "app.pagamentotheme");
$router->get("/listaderotas", "App:listaderotas", "app.listaderotas");
$router->get("/pagamentoefetuado", "App:pagamentoefetuado", "app.pagamentoefetuado");
$router->get("/cancelarrota", "App:cancelarrota", "app.cancelarrota");
$router->get("/rotascanceladas", "App:rotascanceladas", "app.rotascanceladas");
$router->get("/detalhepagamento", "App:detalhepagamento", "app.detalhepagamento");
$router->get("/pagamentorotapagseguro", "App:pagamentorotapagseguro", "app.pagamentorotapagseguro");





$router->get("/teste", "App:teste", "app.teste");

$router->get("/sair", "App:logoff", "app.logoff");

/*
 * PROTEGIDOS POST
 */
$router->post("/documentos", "App:home", "app.home");
$router->post("/endereco", "App:endereco", "app.endereco");
$router->post("/comentario", "App:comentario", "app.comentario");
$router->post("/motorista", "App:motorista", "app.motorista");
$router->post("/novarota", "App:novarota", "app.novarota");
$router->post("/contrata", "App:contrata", "app.contrata");
$router->post("/pagamentorotapagseguro", "App:pagamentorotapagseguro", "app.pagamentorotapagseguro");
$router->post("/postp", "App:postp", "app.postp");
$router->post("/finalizar", "App:finalizar", "app.finalizar");
/*
 * GET LOGIN
 */
$router->group(null);
$router->get("/login", "Web:login", "web.login");
$router->get("/cadastrar", "Web:cadastrar", "web.cadastrar");
$router->get("/recuperar", "Web:forget", "web.forget");
$router->get("/senha/{email}/{forget}", "Web:reset", "web.reset");
$router->get("/notificacao", "Web:notificacao", "web.notificacao");
$router->get("/notificacao", "Web:notificacao", "web.notificacao");

/*
 * POST LOGIN
 */
$router->group(null);
$router->post("/login", "Auth:login", "auth.login");
$router->post("/cadastrar", "Auth:cadastrar", "auth.cadastrar");
$router->post("/forget", "Auth:forget", "auth.forget");
$router->post("/reset", "Auth:reset", "auth.reset");

/*
 * LOGIN SOCIAL
 */
$router->group(null);
$router->get("/facebook", "Auth:facebook", "auth.facebook");
$router->get("/google", "Auth:google", "auth.google");


/*
 * ROTA DE ERROR
 */
$router->group("ops");
$router->get("/{errcode}", "Web:error", "web.error");

/*
 * executa a rota
 */
$router->dispatch();

/*
 * PROCESSO DE ERROR
 */
if ($router->error()){
    $router->redirect("web.error", ["errcode" => $router->error()]);
}
ob_end_flush();