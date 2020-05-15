<?php $v->layout("theme/rotas/rotas"); ?>

<div class="col-lg-8">
    <div class="main-content">
        <div class="single-content1">
            <div class="single-job mb-4 justify-content-between">
                <div class="job-text">
                    <h1 style="color: #6c757d; text-align: center">Nova Rota</h1>
                    <ul class="mt-4">
                        <form class="auth_form" action="<?= $router->route("app.contrata") ?>" method="post" enctype="multipart/form-data">

                            <div class="login_form_callback">
                              <?= flash(); ?>
                            </div>
                            <input type="text" readonly value="<?= $rotas->id ?>" class="form-control" name="id_rota">
                            <input type="text" readonly value="<?= $rotas->login_id ?>" class="form-control" name="id_mot">

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label>Nome do Produto:</label>
                                    <input type="text" class="form-control" name="nome">

                                </div>
                                <div class="form-group col-md-4">
                                    <label>Descrição:</label>
                                    <input type="text" class="form-control" name="descricao">
                                </div>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary btn-lg btn-block active">Cadastrar</button>
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