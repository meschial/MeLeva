<?php $v->layout("theme/theme"); ?>

<section class="job-single-content section-padding" style="margin-top: -5%">
  <div class="container">
    <div class="row">

      <?php if (!empty($v->section("content"))): ?>
            <?= $v->section("content"); ?>
      <?php else: ?>

        <div class="col-lg-8">
            <div class="main-content">
                <div class="single-content1">
                    <div class="single-job mb-4 justify-content-between">
                        <div class="job-text">
                            <h1 style="color: #6c757d; text-align: center">Nova Rota</h1>
                            <ul class="mt-4">
                                <div class="card-group">
                                    <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                                        <div class="card-header"><h4>Rotas Em Andamento</h4></div>
                                        <div class="card-body">
                                            <h5 class="card-title">Primary card title</h5>
                                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                        </div>
                                    </div>
                                    <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                                        <div class="card-header"><h4>Rotas Finalizadas</h4></div>
                                        <div class="card-body">
                                            <h5 class="card-title">Secondary card title</h5>
                                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                        </div>
                                    </div>
                                    <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                                        <div class="card-header"><h4>Rotas Canceladas</h4></div>
                                        <div class="card-body">
                                            <h5 class="card-title">Success card title</h5>
                                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                        </div>
                                    </div>
                                </div>
                            </ul>
                        </div>
                        <div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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