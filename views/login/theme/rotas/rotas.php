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
                        <a href="<?= $router->route("app.suasrotas"); ?>" class="sidebar-btn mb-3">
                            <strong>Rotas em Andamento</strong>
                        </a>
                        <a href="" class="sidebar-btn mb-3">
                            <strong>Rotas Finalizadas</strong>
                        </a>
                        <a href="" class="sidebar-btn mb-3">
                            <strong>Seus Saldos</strong>
                        </a>
                    </div>
                    <div class="single-item mb-4">
                        <h4 class="mb-4">job by location</h4>
                        <a href="#" class="sidebar-btn d-flex justify-content-between mb-3">
                            <span>New York</span>
                            <span class="text-right">25 job</span>
                        </a>
                        <a href="#" class="sidebar-btn d-flex justify-content-between mb-3">
                            <span>California</span>
                            <span class="text-right">25 job</span>
                        </a>
                        <a href="#" class="sidebar-btn d-flex justify-content-between mb-3">
                            <span>Swizerland</span>
                            <span class="text-right">25 job</span>
                        </a>
                        <a href="#" class="sidebar-btn d-flex justify-content-between mb-3">
                            <span>Canada</span>
                            <span class="text-right">25 job</span>
                        </a>
                        <a href="#" class="sidebar-btn d-flex justify-content-between">
                            <span>Sweden</span>
                            <span class="text-right">25 job</span>
                        </a>
                    </div>
                    <div class="single-item mb-4">
                        <h4 class="mb-4">salary range</h4>
                        <a href="#" class="sidebar-btn d-flex justify-content-between mb-3">
                            <span>$20,000-$30,000</span>
                            <span class="text-right">25 job</span>
                        </a>
                        <a href="#" class="sidebar-btn d-flex justify-content-between mb-3">
                            <span>$25,000-$45,000</span>
                            <span class="text-right">25 job</span>
                        </a>
                        <a href="#" class="sidebar-btn d-flex justify-content-between">
                            <span>$40,000-$70,000</span>
                            <span class="text-right">25 job</span>
                        </a>
                    </div>
                    <div class="single-item">
                        <h4 class="mb-4">filter by salary</h4>
                        <input type="text" id="range" value="" name="range" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>