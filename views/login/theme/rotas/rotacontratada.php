<?php $v->layout("theme/rotas/rotas"); ?>

<div class="col-lg-8">
    <div class="main-content">
        <div class="single-content1">
            <div class="single-job mb-4 justify-content-between">
                <div class="job-text">
                    <h1 style="color: #6c757d; text-align: center">Rotas Contratadas </h1>
                    <ul class="mt-4">
                        <div class="login_form_callback">
                            <?= flash(); ?>
                        </div>


                        <?php if (!empty($ativo) and (!empty($rotas))): foreach ($rotas as $rota)?>
                            <?php if ($rota->status === "3"){$status = "Pago";} ?>

                            <div class="main-content">
                            <div class="single-content1">
                        <?php foreach ($rotas as $rota):
                            ?>
                            <div class="single-job mb-4 d-lg-flex justify-content-between">
                                <div class="job-text">
                                    <h4><b>Produto: <?= $rota->nome ?></b></h4>
                                    <ul class="mt-4">
                                        <li class="mb-3"><h5>Descrição: <?= $rota->descricao?></h5></li>
                                        <li class="mb-3"><h5>Valor: <?= number_format($rota->valor,2,",",".");?></h5></li>
                                        <li class="mb-3"><h5>Status: <?= $status?></h5></li>

                                    </ul>
                                </div>
                            </div>
                            <div class="job-btn align-self-center">

                                <a href="<?= $router->route('app.motocancelarrota', ['id' => $rota->id]) ?>" class="btn btn-primary">Ver dados</a>
                                <a href="<?= $router->route('app.motocancelarrota', ['id' => $rota->id]) ?>" class="btn btn-danger">Cancelar</a>

                            </div>
                        <?php endforeach; ?>

                            </div>
                            </div>

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
