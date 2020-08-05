<?php $v->layout("theme/pagamentos/theme");?>

<div class="col-lg-8">
    <div class="main-content">
        <div class="single-content1">
            <div class="single-job mb-4 justify-content-between">
                <div class="job-text">
                    <h1 style="color: #6c757d; text-align: center">Contratar Rota</h1>
                    <ul class="mt-4">
                        <form class="auth_form" action="<?= $router->route("app.contrata") ?>" method="post" enctype="multipart/form-data">

                            <div class="login_form_callback">
                              <?= flash(); ?>
                            </div>
                            <h3><b>Detalhes da Rota</b></h3>
                            <h4>Cidade Origem: <?= $rotas->cidade_inicio ?> | Cidade Destino: <?= $rotas->cidade_fim?></h4>
                            <h5>CEP Origem: <?= $rotas->cep_inicio ?> | CEP Destino: <?= $rotas->cep_fim?> | ValorR$: <?= number_format($rotas->valor, 2, ',', '') ?></h5><br>
                            <input type="hidden" readonly value="<?= $rotas->id ?>" class="form-control" name="id_rota">
                            <input type="hidden" readonly value="<?= $rotas->login_id ?>" class="form-control" name="id_mot">

                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label>Nome do Produto:</label>
                                    <input type="text" class="form-control" name="nome">
                                </div>

                            </div>
                            <div class="form-row">

                                <div class="form-group col-md-12">
                                    <label>Descrição do produto:</label>
                                    <textarea type="text" class="form-control" name="descricao" rows="5" maxlength="200"></textarea>
                                </div>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary btn-lg btn-block active">Contratar</button>
                            </div>
                        </form>
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