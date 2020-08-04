<?php $v->layout("theme/theme"); ?>

<section class="job-single-content section-padding" style="margin-top: -5%">
    <div class="container">
        <div class="row">

            <?php if (!empty($v->section("content"))): ?>
                <?= $v->section("content"); ?>
            <?php endif; ?>

            <div class="col-lg-4">
                <div class="sidebar">
                    <div class="single-item mb-4">
                        <h4 class="mb-4">Seus Dados</h4>
                        <a href="<?= $router->route("app.comentario"); ?>" class="sidebar-btn mb-3">
                            <strong>Comentário</strong>
                        </a>
                        <a href="<?= $router->route("app.home");?>" class="sidebar-btn mb-3">
                            <strong>Meus Dados</strong>
                        </a>
                        <a href="<?= $router->route("app.endereco"); ?>" class="sidebar-btn mb-3">
                            <strong>Endereço</strong>
                        </a>
                        <a href="<?= $router->route("app.motorista"); ?>" class="sidebar-btn mb-3">
                            <strong>Motorista</strong>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>