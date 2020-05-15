<?php $v->layout("admin/theme");?>
<section class="section">
  <div class="section-body">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4>Pagamentos em Andamento</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Nome</th>
                  <th>Data</th>
                  <th>Valor</th>
                  <th>Status</th>
                  <th>Opções</th>
                </tr>
                </thead>
                <tbody>
                <?php if(!empty($vendas)): foreach ($vendas as $venda): if ($venda->status == "F"){$venda->status = "Finalizado";}elseif ($venda->status == "A"){$venda->status = "Andamento";}else{$venda->status = "Cancelado";} ?>
                  <tr>
                    <td><?= $venda->id ?></td>
                    <td><?= $venda->nome ?></td>
                    <td><?= $venda->date ?></td>
                    <td>R$:<?=number_format($venda->valor,2,",",".") ?></td>
                      <td><?php if ($venda->status == "Finalizado"){ ?>
                              <div class="badge badge-success"><?= $venda->status ?></div>
                        <?php } elseif ($venda->status == "Andamento"){  ?>
                              <div class="badge badge-info"><?= $venda->status ?></div>
                        <?php } else{ ?>
                              <div class="badge badge-danger"><?= $venda->status ?></div>
                        <?php } ?>
                      </td>
                    <td>
                      <a href="<?= $router->route('admin.detalherota', ['id'=>$venda->id]) ?>" class="btn btn-icon icon-left btn-info"><i class="fas fa-info-circle"></i>Ver Mais</a>
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