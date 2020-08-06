<?php $v->layout("admin/theme");?>
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Realiza Pagamento</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="login_form_callback">
                                <?= flash(); ?>
                            </div>
                            <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>Data</th>
                                    <th>Valor</th>
                                    <th>Status</th>
                                    <th>Opções</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if(!empty($vendas)): foreach ($vendas as $venda):
                                    if ($venda->status == "1"){$venda->status = "Aguardando pagamento";}
                                    elseif ($venda->status == "2"){$venda->status = "Em análise";}
                                    elseif ($venda->status == "3"){$venda->status = "Paga";}
                                    elseif ($venda->status == "4"){$venda->status = "Disponível";}
                                    elseif ($venda->status == "5"){$venda->status = "Em disputa";}
                                    elseif ($venda->status == "6"){$venda->status = "Devolvida";}
                                    elseif ($venda->status == "7"){$venda->status = "Cancelada";}
                                    elseif ($venda->status == "8"){$venda->status = "Debitado";}
                                    elseif ($venda->status == "9"){$venda->status = "Retenção temporária";}?>
                                    <tr>
                                        <td><?= $venda->id ?></td>
                                        <td><?= $venda->nome ?></td>
                                        <td><?= $venda->date ?></td>
                                        <td>R$:<?=number_format($venda->valor,2,",",".") ?></td>
                                        <td><?php if ($venda->status == "Aguardando pagamento"){ ?>
                                                <div class="badge badge-white"><?= $venda->status ?></div>
                                            <?php } elseif ($venda->status == "Em análise"){  ?>
                                                <div class="badge badge-warning"><?= $venda->status ?></div>
                                            <?php } elseif ($venda->status == "Paga"){  ?>
                                                <div class="badge badge-secondary"><?= $venda->status ?></div>
                                            <?php } elseif ($venda->status == "Disponível"){  ?>
                                                <div class="badge badge-success"><?= $venda->status ?></div>
                                            <?php } elseif ($venda->status == "Em disputa"){  ?>
                                                <div class="badge badge-info"><?= $venda->status ?></div>
                                            <?php } elseif ($venda->status == "Devolvida"){  ?>
                                                <div class="badge badge-dark"><?= $venda->status ?></div>
                                            <?php } elseif ($venda->status == "Cancelada"){  ?>
                                                <div class="badge badge-danger"><?= $venda->status ?></div>
                                            <?php } elseif ($venda->status == "Debitado"){  ?>
                                                <div class="badge badge-primary"><?= $venda->status ?></div>
                                            <?php } elseif ($venda->status == "Retenção temporária"){  ?>
                                                <div class="badge badge-transparent"><?= $venda->status ?></div>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <a href="<?= $router->route('admin.pagars', ['id'=>$venda->id]) ?>" class="btn btn-icon icon-left btn-info"><i class="fas fa-info-circle"></i>Pagar</a>
                                        </td>
                                    </tr>
                                <?php endforeach; endif;?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $v->start("scripts"); ?>
    <script src="<?= asset("/js/form.js"); ?>"></script>
<?php $v->end(); ?>