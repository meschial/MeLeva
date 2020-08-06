<?php $v->layout("theme/theme"); ?>


<!-- Banner Area Starts -->
    <section class="banner-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 px-0">
                    <div class="banner-bg"></div>
                </div>
                <div class="col-lg-6 align-self-center">
                    <div class="banner-text">
                        <h1>envie rapido e fácil com a <span>me leva!</span></h1>
                        <p class="py-3">O Projeto ME LEVA se trata de um sistema de entrega de produtos, encomendas, cartas... É
                            um sistema de interface simples e de fácil acesso,
                            depois do cadastro aprovado qualquer pessoa pode levar ou enviar uma encomenda.
                            Basta fazer seu cadastro e achar o melhor preço</p>
                        <a href="<?= $router->route("web.cadastrar");?>" class="secondary-btn">cadastre-se<span class="flaticon-next"></span></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner Area End -->

<!-- Search Area Starts -->
<div class="search-area">
    <div class="search-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="login_form_callback">
                        <?= flash(); ?>
                    </div>
                    <form action="<?= $router->route("site.buscarotas"); ?>" method="POST" enctype="multipart/form-data" class="d-md-flex justify-content-between">
                        <input type="text" name="origem" data-mask="99999-999" placeholder="Digite CEP de Origem">
                        <input type="text" name="destino" data-mask="99999-999" placeholder="Digite CEP de Destino">
                        <input type="date" name="dete" placeholder="Digite a Data do envio">
                        <button type="submit" class="template-btn">Pesquisar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Search Area End -->

<!-- Pricing Table Starts -->
<section class="pricing-table section-padding" style="margin-top: -5%">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-top text-center">
                    <h2>Veja alguns de nossos comentarios</h2>
                    <p>Venha fazer parte da MeLeva</p>
                </div>
            </div>
        </div>
        <div class="row">
            <?php foreach($con as $tex): ?>
            <div class="col-md-4">
                <div class="single-table text-center mb-4">
                    <div class="table-top">
                        <img src="<?= $tex->foto;?>" style="width: 40%" class="card-img-top" alt="...">
                        <h3 style="margin-top: 10px"> <?= $tex->nome; ?></h3>
                    </div>
                    <ul class="my-5">
                        <h4 class="template-btn"><?= $tex->titulo;?></h4>
                        <p><?= $tex->texto; ?></p>
                    </ul>
                </div>
            </div>
            <?php endforeach; ?>

        </div>
    </div>
</section>
<!-- Pricing Table End -->