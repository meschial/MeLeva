<?php $v->layout("admin/theme");?>
<section class="section">
  <div class="section-body">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4>Todos Usuarios</h4>
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
                <?php if(!empty($usuarios)): foreach ($usuarios as $usuario): if ($usuario->ativo === "D"){$usuario->ativo = "Desativado";}else{$usuario->ativo = "Ativo";}?>
                <tr>
                  <td><?= $usuario->id ?></td>
                  <td><?= $usuario->nome ?></td>
                  <td><?= $usuario->sobrenome ?></td>
                  <td><?= $usuario->email ?></td>
                  <td><?php if($usuario->ativo === "Desativado"){ ?>
                        <div class="badge badge-danger"><?= $usuario->ativo ?></div>
                  <?php }else{ ?>
                        <div class="badge badge-success"><?= $usuario->ativo ?></div>
                  <?php } ?>
                    </td>
                  <td>
                    <a href="<?= $router->route('admin.editarUsuario', ['id'=>$usuario->id]);?>" class="btn btn-icon icon-left btn-info"><i class="fas fa-list"></i>Ver Mais</a>
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