<?php $v->layout("theme/rotas/rotas"); ?>

<div class="col-lg-8">
    <div class="main-content">
        <div class="single-content1">
            <div class="single-job mb-4 justify-content-between">
                <div class="job-text">
                    <h1 style="color: #6c757d; text-align: center">Seus Saldos </h1>
                    <ul class="mt-4">
                        <div class="login_form_callback">
                            <?= flash(); ?>
                        </div>

                        <?php if (!empty($ativo) and (!empty($rotas))): ?>

                            <div class="main-content">
                                <div class="single-content1">

                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <th scope="col">ID</th>
                                                    <th scope="col">Nome</th>
                                                    <th scope="col">Data</th>
                                                    <th scope="col">Valor</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php foreach ($rotas as $rota): ?>
                                                    <tr>
                                                        <th scope="row"><?= $rota->id ?></th>
                                                        <td><?= $rota->nome ?></td>
                                                        <td><?= $rota->date ?></td>
                                                        <td><?=number_format($rota->valor,2,",",".") ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                </div>
                            </div>

                            <div class=" text-right">
                                <?php if(!empty($valor)): foreach ($valor as $pags): ?>
                                    <div class="invoice-detail-item">
                                        <div class="invoice-detail-name"><b>Subtotal</b></div>
                                        <div class="invoice-detail-value">R$: <?= number_format($pags->valores, 2, ',', ' ') ?></div>
                                    </div>
                                    <div class="invoice-detail-item">
                                        <div class="invoice-detail-name"><b>Taxas MeLeva</b></div>
                                        <?php  $valor_descontado = $pags->valores - ($pags->valores / 100 * 20.00); $desconto = $pags->valores - $valor_descontado?>
                                        <div class="invoice-detail-value">R$: <?= number_format($desconto, 2, ',', ' ') ?> </div>
                                    </div>
                                    <hr class="mt-2 mb-2">
                                    <div class="invoice-detail-item">
                                        <div class="invoice-detail-name"><b>Total</b></div>
                                        <div class="invoice-detail-value invoice-detail-value-lg">R$: <?= number_format($valor_descontado, 2, ',', ' ') ?></div>
                                    </div>
                                    <button href="https://api.whatsapp.com/send?phone=5544999176602&text=Ola%20quero%20receber" class="btn-outline-success">Receber</button>
                                <?php endforeach; endif;?>
                            </div>


                        <?php else: ?>
                            <h1>Vc não está ativo ou está sem saldos no momento!</h1>
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
