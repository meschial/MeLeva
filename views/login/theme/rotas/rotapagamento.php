<?php $v->layout("theme/rotas/rotas"); ?>

<div class="col-lg-8">
  <div class="main-content">
    <div class="single-content1">
      <div class="single-job mb-4 justify-content-between">
        <div class="job-text">
          <h1 style="color: #6c757d; text-align: center">Meio de Pagamento</h1>
          <ul class="mt-4">
              <div class="login_form_callback">
                <?= flash(); ?>
              </div>
                <?php foreach ($venda as $vend): ?>

                  <h2>Produto: <b><?= $vend->nome ?></b></h2>
                  <h4>Descrição: <b><?= $vend->descricao ?></b></h4>
                  <h4>Valor R$: <b><?= number_format( $vend->valor, 2, ',', ' ') ?></b> | Data: <b><?= $vend->date ?></b></h4>
                  </br>
                  <div class="row">
                    <a href="<?= $router->route('app.pagamentorotapagseguro', ['id'=>$vend->id]) ?>" class="btn btn-primary btn-lg btn-block active">Pagar com Cartão</a>
                  </div>

                <?php endforeach; ?>

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
