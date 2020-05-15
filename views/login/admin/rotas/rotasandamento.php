<?php $v->layout("admin/theme");?>
<section class="section">
  <div class="section-body">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4>Rotas em Andamento</h4>
          </div>
          <div class="login_form_callback">
            <?= flash(); ?>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                <thead>
                <tr>
                  <th>Origem</th>
                  <th>Destino</th>
                  <th>Data</th>
                  <th>Quantidade</th>
                  <th>Valor</th>
                  <th>Opções</th>
                </tr>
                </thead>
                <tbody>
                <?php if(!empty($rotas)): foreach ($rotas as $rota):?>
                <tr>
                  <td><?= $rota->cidade_inicio ?></td>
                  <td><?= $rota->cidade_fim ?></td>
                  <td><?= $rota->data_inicio ?></td>
                  <td>Un: <?= $rota->quantidade ?></td>
                  <td>R$:<?=number_format($rota->valor,2,",",".") ?></td>
                  <td>
                    <a href="<?= $router->route('admin.detalherota', ['id'=>$rota->id]) ?>" class="btn btn-icon icon-left btn-info"><i class="fas fa-info-circle"></i>Ver Mais</a>
                    <a href="<?= $router->route('admin.desativarota', ['id'=>$rota->id]) ?>" class="btn btn-icon icon-left btn-danger"><i class="fas fa-times"></i>Desativar</a>
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
