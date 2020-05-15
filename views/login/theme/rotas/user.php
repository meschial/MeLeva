<article class="users_user">
  <h3><?= "<b>Nome:</b> {$prod->nome} / <b>Quantidade:</b> {$prod->quantidade}"; ?></h3>
  <a class="btn btn-danger" href="#" data-action="<?= $router->route("app.excluirproduto");?>"
     data-id="<?= $prod->id; ?>">Excluir</a>
  <article>