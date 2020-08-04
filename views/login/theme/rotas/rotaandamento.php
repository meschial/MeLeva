<?php $v->layout("theme/rotas/rotas"); ?>

<div class="col-lg-8">
  <div class="main-content">
    <div class="single-content1">
      <div class="single-job mb-4 justify-content-between">
        <div class="job-text">
          <h1 style="color: #6c757d; text-align: center">Rotas em Andamento </h1>
          <ul class="mt-4">
              <div class="login_form_callback">
                  <?= flash(); ?>
              </div>


              <?php if (!empty($ativo) and (!empty($rotas))): foreach ($rotas as $rota)?>


                <div class="main-content">
                  <div class="single-content1">
                    <?php foreach ($rotas as $rota):
                      ?>
                      <div class="single-job mb-4 d-lg-flex justify-content-between">
                        <div class="job-text">
                          <h4><b>CEP ORIGEM: <?= $rota->cep_inicio." <strong> / CEP DESTINO: </strong> ".$rota->cep_fim?></b></h4>
                          <ul class="mt-4">
                            <li class="mb-3"><h5><i class="fa fa-map-marker"></i>Cidade Origem: <?= $rota->cidade_inicio?> / Destino: <?= $rota->cidade_fim?></h5></li>
                            <li class="mb-3"><h5><i class="fa fa-pie-chart"></i>Qtd. de Pacotes: <?= $rota->quantidade;?> / Valor por pacote R$: <?= number_format($rota->valor,2,",",".");?></h5></li>
                            <li><h5><i class="fa fa-clock-o"></i> Data: <?= $rota->data_inicio; ?></h5></li>
                          </ul>
                        </div>
                        <div class="job-btn align-self-center">

                          <a href="<?= $router->route('app.motocancelarrota', ['id' => $rota->id]) ?>" class="btn btn-danger">Cancelar</a>

                        </div>
                      </div>
                    <?php endforeach; ?>

                  </div>
                </div>


            <?php else: ?>
            <h1>Vc não está ativo como motorista!</h1>
             <?php endif; ?>
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
