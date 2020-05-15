<?php $v->layout("admin/theme");?>
<section class="section">
  <div class="section-body">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4>Usuarios Desativados</h4>
          </div>
            <div class="login_form_callback">
              <?= flash(); ?>
            </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Sobrenome</th>
                    <th>E-Mail</th>
                    <th>Ativo</th>
                    <th>Opções</th>
                </tr>
                </thead>
                <tbody>
                <?php if(!empty($usuarios)): foreach ($usuarios as $usuario): if ($usuario->ativo === "D"){$usuario->ativo = "Desativado";}?>
                    <tr>
                        <td><?= $usuario->id ?></td>
                        <td><?= $usuario->nome ?></td>
                        <td><?= $usuario->sobrenome ?></td>
                        <td><?= $usuario->email ?></td>
                        <td>
                            <div class="badge badge-danger"><?= $usuario->ativo ?></div>
                        </td>
                  <td>
                      <a href="<?= $router->route('admin.editarUsuario', ['id'=>$usuario->id]) ?>" class="btn btn-icon icon-left btn-info"><i class="fas fa-info-circle"></i>Ver Mais</a>
                      <a href="<?= $router->route('admin.ativarusuario', ['id'=>$usuario->id]) ?>" class="btn btn-icon icon-left btn-success"><i class="fas fa-check"></i>Ativar</a>
                  </td>
                </tr>
                <?php endforeach; endif;?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>