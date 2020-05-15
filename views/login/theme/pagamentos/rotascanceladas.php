<?php $v->layout("theme/pagamentos/theme");?>

  <div class="col-lg-8">
    <div class="main-content">
      <div class="single-content1">
        <div class="single-job mb-4 justify-content-between">
          <div class="job-text">
            <h1 style="color: #6c757d; text-align: center">Rotas Aguardando pagamento</h1>
            <ul class="mt-4">

              <div class="login_form_callback">
                <?= flash(); ?>
              </div>

              <?php
              if (!empty($rotas)):
                foreach ($rotas as $rota):
                  ?>

                  <div class="mb-4">
                    <div class="job-text">
                      <h4><b>CEP ORIGEM: <?= $rota->cep_inicio." <strong> / CEP DESTINO: </strong> ".$rota->cep_fim?></b></h4>
                      <ul class="mt-4">
                        <li class="mb-3"><h5><i class="fa fa-map-marker"></i>Cidade Origem: <?= $rota->cidade_inicio?> / Destino: <?= $rota->cidade_fim?></h5></li>
                        <li class="mb-3"><h5><i class="fa fa-pie-chart"></i>Nome do produto: <?= $rota->nome;?> / Valor cobrado R$: <?= number_format($rota->valor,2,",",".")?></h5></li>
                        <li><h5><i class="fa fa-clock-o"></i> Data do envio: <?= $rota->data_inicio; ?></h5></li>
                      </ul>
                      <div class="row">
                        <a href="<?= $router->route('app.contratarrota') ?>" class="btn btn-primary btn-lg btn-teste active">Contratar</a>
                        <a href="<?= $router->route('app.cancelarrota', ['id' => $rota->id_venda]) ?>" class="btn btn-danger btn-lg btn-teste active">Detalhes</a>
                      </div>
                    </div>
                  </div>

                <?php
                endforeach;
              endif;
              ?>

            </ul>
          </div>
          <div>
          </div>
        </div>
      </div>
    </div>
  </div>


<?php $v->start("scripts"); ?>
  <script src="<?= asset("/js/form.js"); ?>"></script>
<?php $v->end(); ?>