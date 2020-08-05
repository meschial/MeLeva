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
            <h4 class="mb-4">Seus Pagamentos</h4>
            <a href="<?= $router->route("app.listaderotas"); ?>" class="sidebar-btn mb-3">
              <strong>Aguardando Pagamento</strong>
            </a>
              <a href="<?= $router->route("app.rotascanceladas"); ?>" class="sidebar-btn mb-3">
                  <strong>Pagamentos Cancelados</strong>
              </a>
            <a href="<?= $router->route("app.pagamentoefetuado"); ?>" class="sidebar-btn mb-3">
                <strong>Pagamentos Efetuado</strong>
            </a>
          </div>



        </div>
      </div>
    </div>
  </div>
</section>