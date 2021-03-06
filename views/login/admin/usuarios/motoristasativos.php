<?php $v->layout("admin/theme");?>
<section class="section">
  <div class="section-body">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4>Motoristas Ativos</h4>
          </div>
          <div class="login_form_callback">
            <?= flash(); ?>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                <thead>
                <tr>
                  <th>Nome</th>
                  <th>E-Mail</th>
                  <th>Tipo CNH</th>
                  <th>Nº CNH</th>
                  <th>Ativo</th>
                  <th>Opções</th>
                </tr>
                </thead>
                <tbody>
                <?php if(!empty($motoristas)): foreach ($motoristas as $motorista): if ($motorista->mot_ativo == "S"){$motorista->mot_ativo = "Ativo";} ?>
                <tr>
                  <td><?= $motorista->nome ?></td>
                  <td><?= $motorista->email ?></td>
                  <td><?= $motorista->tipo_cnh ?></td>
                  <td><?= $motorista->cnh ?></td>
                  <td><div class="badge badge-success"><?= $motorista->mot_ativo ?></div></td>
                  <td>
                      <form method="post" action="<?= $router->route('admin.desativarmotorista') ?>" enctype="multipart/form-data">
                          <a href="<?= $router->route('admin.editarUsuario', ['id'=>$motorista->login_id]) ?>" class="btn btn-icon icon-left btn-info"><i class="fas fa-info-circle"></i>Ver Mais</a>
                          <input type="hidden" name="id" value="<?= $motorista->mot_id ?>">
                          <button type="submit" class="btn btn-icon icon-left btn-danger"><i class="fas fa-check"></i>Desativar</button>
                      </form>
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

<?php $v->start("scripts"); ?>
    <script src="<?= asset("/js/form.js"); ?>"></script>
<?php $v->end(); ?>