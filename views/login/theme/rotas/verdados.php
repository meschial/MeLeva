<?php $v->layout("theme/rotas/rotas"); ?>


<div class="col-lg-8">
    <div class="main-content">
        <div class="single-content1">
            <div class="single-job mb-4 justify-content-between">
                <div class="job-text">
                    <h1 style="color: #6c757d; text-align: center">Dados do Cliente </h1>
                    <ul class="mt-4">
                        <div class="login_form_callback">
                            <?= flash(); ?>
                        </div>


                        <?php if (!empty($users) and (!empty($cells))): foreach ($users as $user)?>


                            <div class="main-content">
                            <div class="single-content1">
                        <?php foreach ($cells as $cell):
                            ?>
                            <div class="single-job mb-4 d-lg-flex justify-content-between">
                                <div class="job-text">
                                    <h4><b>Nome:</b> <?= $user->nome?> <?= $user->sobrenome ?></h4>
                                    <ul class="mt-4">
                                        <li class="mb-3"><h5>E-Mail: <?= $user->email?></h5></li>
                                        <li class="mb-3"><h5>CPF: <?= $cell->cpf;?> / RG: <?= $cell->rg?></h5></li>
                                        <li><h5>Celular: <?= $cell->celular; ?></h5></li>
                                    </ul>
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

