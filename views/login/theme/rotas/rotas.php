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
                        <h4 class="mb-4">Suas Rotas</h4>
                        <a href="<?= $router->route("app.novarota"); ?>" class="sidebar-btn mb-3">
                            <strong>Nova Rota</strong>
                        </a>
                        <a href="<?= $router->route("app.rotaandamento"); ?>" class="sidebar-btn mb-3">
                            <strong>Rotas em Andamento</strong>
                        </a>
                        <a href="<?= $router->route("app.rotafinalizada"); ?>" class="sidebar-btn mb-3">
                            <strong>Rotas Finalizadas</strong>
                        </a>
                        <a href="<?= $router->route("app.rotacontratada"); ?>" class="sidebar-btn mb-3">
                            <strong>Rotas Contratadas</strong>
                        </a>
                        <a href="<?= $router->route("app.saldo"); ?>" class="sidebar-btn mb-3">
                            <strong>Seus Saldos</strong>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>