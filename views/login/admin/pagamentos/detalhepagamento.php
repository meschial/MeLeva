<?php $v->layout("admin/theme"); ?>

    <section class="section">
        <div class="section-body">
            <div class="row mt-sm-4">
                <div class="col-12 col-md-12 col-lg-4">
                    <div class="card author-box">
                        <div class="card-body">
                            <div class="author-box-center">
                                <img alt="image" src="<?= $login->foto ?>" class="rounded-circle author-box-picture">
                                <div class="clearfix"></div>
                                <div class="author-box-name">
                                    <a href="#">Nome: <?= $login->nome ?></a>
                                </div>
                                <div class="author-box-job">Sobrenome: <?= $login->sobrenome ?></div>
                            </div>
                            <div class="text-center">
                                <div class="author-box-description">
                                    <p>E-Mail: <?= $login->email ?></p>
                                </div>
                                <div class="mb-2 mt-3">
                                    <div class="text-small font-weight-bold">
                                      <?php if ($login->ativo === "S"){$login->ativo = "Ativo";}else{$login->ativo = "Desativado";} ?>
                                      <?php if ($login->ativo === "Desativado"){ ?>
                                          <div class="badge badge-danger"><?= $login->ativo ?></div>
                                      <?php }else{ ?> <div class="badge badge-success"><?= $login->ativo ?></div><?php } ?>
                                    </div>
                                </div>

                                <div class="w-100 d-sm-none"></div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4>Dados pessoais</h4>
                        </div>
                      <?php if ($documentos): foreach ($documentos as $doc) ?>
                          <div class="card-body">
                          <div class="py-4">
                          <p class="clearfix">
                          <span class="float-left">Data de nascimento:</span>
                          <span class="float-right text-muted"><?= $doc->date ?></span>
                          </p>
                          <p class="clearfix">
                              <span class="float-left">Celular:</span>
                              <span class="float-right text-muted"><?= $doc->celular ?></span>
                          </p>
                          <p class="clearfix">
                              <span class="float-left">CPF:</span>
                              <span class="float-right text-muted"><?= $doc->cpf ?></span>
                          </p>
                          <p class="clearfix">
                              <span class="float-left">RG:</span>
                              <span class="float-right text-muted"><?= $doc->rg ?></span>
                          </p>
                          </div>
                          </div>
                      <?php endif; ?>
                    </div>
                </div>

                <div class="col-12 col-md-12 col-lg-8">
                    <div class="card">
                        <div class="padding-20">
                            <ul class="nav nav-tabs" id="myTab2" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab2" data-toggle="tab" href="#about" role="tab"
                                       aria-selected="true">Dados Login</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab2" data-toggle="tab" href="#settings" role="tab"
                                       aria-selected="false">Dados Endereço</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab2" data-toggle="tab" href="#pessoais" role="tab"
                                       aria-selected="false">Dados Pessoais</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab2" data-toggle="tab" href="#motorista" role="tab"
                                       aria-selected="false">Dados Motorista</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab2" data-toggle="tab" href="#rotas" role="tab"
                                       aria-selected="false">Rotas</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab2" data-toggle="tab" href="#pagamentos" role="tab"
                                       aria-selected="false">Pagamentos Disponiveis</a>
                                </li>
                            </ul>
                            <div class="tab-content tab-bordered" id="myTab3Content">
                                <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="home-tab2">
                                    <form class="auth_form" method="post" action="<?= $router->route('admin.salvarlogin') ?>" enctype="multipart/form-data">

                                        <div class="login_form_callback">
                                          <?= flash(); ?>
                                        </div>

                                        <div class="card-header">
                                            <h4>Editar dados do Usuario <?= $login->nome ?></h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="form-group col-md-1 col-12">
                                                    <label>ID</label>
                                                    <input type="text" name="id" class="form-control" value="<?= $login->id ?>">
                                                </div>
                                                <div class="form-group col-md-5 col-12">
                                                    <label>Primeiro Nome</label>
                                                    <input type="text" name="nome" class="form-control" value="<?= $login->nome ?>">
                                                </div>
                                                <div class="form-group col-md-6 col-12">
                                                    <label>Sobrenome</label>
                                                    <input type="text" name="sobrenome" class="form-control" value="<?= $login->sobrenome ?>">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-7 col-12">
                                                    <label>E-Mail</label>
                                                    <input type="email" name="email" class="form-control" value="<?= $login->email ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label">Status</label>
                                                    <div class="selectgroup w-100">
                                                        <label class="selectgroup-item">
                                                            <input type="radio" name="ativo" value="S" class="selectgroup-input-radio" <?php if ($login->ativo == "Ativo"){ ?> checked="" <?php } ?>>
                                                            <span class="selectgroup-button">Ativo</span>
                                                        </label>
                                                        <label class="selectgroup-item">
                                                            <input type="radio" name="ativo" value="D" class="selectgroup-input-radio" <?php if ($login->ativo == "Desativado"){ ?> checked="" <?php } ?>>
                                                            <span class="selectgroup-button">Desativado</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="card-footer text-right">
                                            <button type="submit" class="btn btn-primary" >Atualizar Dados</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="profile-tab2">
                                    <?php if(!empty($endereco)):  foreach ($endereco as $end):?>
                                    <form method="post" class="needs-validation" action="<?= $router->route("app.endereco") ?>" enctype="multipart/form-data">
                                        <div class="card-header">
                                            <h4>Editar Endereço do Usuario <?= $login->nome ?></h4>
                                        </div>

                                        <div class="card-body">
                                            <div class="login_form_callback">
                                              <?= flash(); ?>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-1">
                                                    <label>ID:</label>
                                                    <input type="text" class="form-control" value="<?= $end->id; ?>" id="id" name="id">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>Cep:</label>
                                                    <input type="text" class="form-control" data-mask="99999-999" value="<?= $end->cep; ?>" id="cep" placeholder="Digite seu cep" name="cep">
                                                </div>
                                                <div class="form-group col-md-7">
                                                    <label>Rua:</label>
                                                    <input type="text" class="form-control" id="rua" value="<?= $end->rua; ?>" placeholder="Digite o nome da rua"  name="rua">
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label>Complemento:</label>
                                                    <input type="text" class="form-control" value="<?= $end->complemento; ?>" placeholder="Digite o complemento" name="complemento">
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-9">
                                                    <label>Bairro:</label>
                                                    <input type="text" id="bairro" class="form-control" value="<?= $end->bairro; ?>" placeholder="Digite seu bairro" name="bairro" >
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label>Número:</label>
                                                    <input type="text" class="form-control" value="<?= $end->numero; ?>" placeholder="Digite o número"  name="numero">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label>Cidade:</label>
                                                    <input type="text" id="cidade" name="cidade" Readonly  class="form-control" value="<?= $end->cidade; ?>" placeholder="Digite o cep correto">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Estado:</label>
                                                    <input type="text" id="uf" name="estado" Readonly class="form-control" value="<?= $end->estado; ?>" placeholder="Digite o cep correto">
                                                </div>
                                            </div>
                                            <div class="card-footer text-right">
                                                <button type="submit" class="btn btn-primary">Atualizar Endereço</button>
                                            </div>
                                        </div>
                                    </form>
                                    <?php endforeach; endif; ?>
                                </div>

                            <div class="tab-pane fade" id="pessoais" role="tabpanel" aria-labelledby="profile-tab2">
                              <?php if(!empty($documentos)):  foreach ($documentos as $userc):?>
                                  <form method="post" class="needs-validation" action="<?= $router->route("app.home"); ?>" enctype="multipart/form-data">
                                      <div class="card-header">
                                          <h4>Editar Documentos do Usuario <?= $login->nome ?></h4>
                                      </div>

                                      <div class="login_form_callback">
                                        <?= flash(); ?>
                                      </div>

                                      <div class="form-row">
                                          <div class="form-group col-md-1">
                                              <label>ID:</label>
                                              <input type="text" class="form-control" value="<?= $userc->id; ?>" id="id" name="id">
                                          </div>
                                          <div class="form-group col-md-5">
                                              <span class="glyphicon glyphicon-list-alt"></span> <label> CPF:</label>
                                              <input type="text" value="<?= $userc->cpf ?>" data-mask="999.999.999-99" placeholder="Digite seu CPF" class="form-control" name="cpf">
                                          </div>
                                          <div class="form-group col-md-6">
                                              <span class="glyphicon glyphicon-list-alt"></span> <label> RG:</label>
                                              <input type="text" value="<?= $userc->rg; ?>" class="form-control" placeholder="Digite seu RG" name="rg">
                                          </div>
                                      </div>
                                      <div class="form-row">
                                          <div class="form-group col-md-6">
                                              <span class="glyphicon glyphicon-calendar"></span> <label>Data Nascimento:</label>
                                              <input type="date"  value="<?= $userc->date; ?>" class="form-control" placeholder="Data de nascimento"  name="date">
                                          </div>
                                          <div class="form-group col-md-6">
                                              <span class="glyphicon glyphicon-earphone"> </span> <label>N. Celular:</label>
                                              <input type="text" value="<?= $userc->celular; ?>" data-mask="(99)99999-9999" placeholder="Digite seu número" class="form-control" name="celular">
                                          </div>
                                      </div>
                                          <div class="card-footer text-right">
                                              <button type="submit" class="btn btn-primary">Atualizar Documentos</button>
                                          </div>
                                  </form>
                              <?php endforeach; endif; ?>
                            </div>

                            <div class="tab-pane fade" id="motorista" role="tabpanel" aria-labelledby="profile-tab2">
                              <?php if(!empty($motorista)):  foreach ($motorista as $userc):?>
                                  <form action="<?= $router->route("admin.salvarMotorista"); ?>" method="post" enctype="multipart/form-data">
                                      <div class="card-header">
                                          <h4>Editar CNH do Usuario <?= $login->nome ?></h4>
                                      </div>

                                      <div class="card-body">
                                          <div class="login_form_callback">
                                            <?= flash(); ?>
                                          </div>

                                          <input type="hidden" name="login_id" value="<?= $userc->login_id ?>">

                                          <div class="form-row">
                                              <div class="form-group col-md-1">
                                                  <label>  ID:</label>
                                                  <input type="text" class="form-control" value="<?= $userc->id; ?>" name="id">
                                              </div>
                                              <div class="form-group col-md-3">
                                                  <label>  Tipo CNH:</label>
                                                  <input type="text" class="form-control" value="<?= $userc->tipo_cnh; ?>" name="tipo_cnh">
                                              </div>
                                              <div class="form-group col-md-3">
                                                  <label> Número CNH:</label>
                                                  <input type="text" class="form-control" value="<?= $userc->cnh; ?>" name="cnh">
                                              </div>

                                              <div class="form-group">
                                                  <label class="form-label">Status</label>
                                                  <div class="selectgroup w-100">
                                                      <label class="selectgroup-item">
                                                          <input type="radio" name="ativo" value="S" class="selectgroup-input-radio" <?php if ($userc->ativo == "S"){ ?> checked="" <?php } ?>>
                                                          <span class="selectgroup-button">Ativo</span>
                                                      </label>
                                                      <label class="selectgroup-item">
                                                          <input type="radio" name="ativo" value="D" class="selectgroup-input-radio" <?php if ($userc->ativo == "N" || $userc->ativo == "D"){ ?> checked="" <?php } ?>>
                                                          <span class="selectgroup-button">Desativado</span>
                                                      </label>
                                                  </div>
                                              </div>
                                          </div>


                                              <div id="aniimated-thumbnials" class="list-unstyled row clearfix">
                                                  <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                                      <a href="<?= asset("/../../../../".$userc->foto);?>"  data-sub-html="Demo Description">
                                                          <img style="width: 50px" src="<?= asset("/../../../../".$userc->foto);?>" alt="">
                                                      </a>
                                                  </div>
                                              </div>
                                          <div class="card-footer text-right">
                                              <button type="submit" class="btn btn-primary">Atualizar CNH</button>
                                          </div>
                                      </div>
                                  </form>
                              <?php endforeach; endif; ?>
                            </div>

                                    <div class="tab-pane fade" id="rotas" role="tabpanel" aria-labelledby="profile-tab2">
                                        <div class="card-header">
                                            <h4>Rotas do <?= $login->nome ?></h4>
                                        </div>

                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                                                    <thead>
                                                    <tr>
                                                        <th>Origem</th>
                                                        <th>Destino</th>
                                                        <th>Data</th>
                                                        <th>Quantidade</th>
                                                        <th>Valor</th>
                                                        <th>Status</th>
                                                        <th>Opções</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php if(!empty($rotas)): foreach ($rotas as $rota): if ($rota->status == "F"){$rota->status = "Finalizada";}elseif ($rota->status == "A"){$rota->status = "Andamento";}else{$rota->status = "Cancelada";}?>
                                                        <tr>
                                                            <td><?= $rota->cidade_inicio ?></td>
                                                            <td><?= $rota->cidade_fim ?></td>
                                                            <td><?= $rota->data_inicio ?></td>
                                                            <td>Un: <?= $rota->quantidade ?></td>
                                                            <td>R$:<?=number_format($rota->valor,2,",",".") ?></td>
                                                            <td><?php if ($rota->status == "Finalizada"){ ?>
                                                                    <div class="badge badge-success"><?= $rota->status ?></div>
                                                              <?php } elseif ($rota->status == "Andamento"){  ?>
                                                                    <div class="badge badge-info"><?= $rota->status ?></div>
                                                              <?php } else{ ?>
                                                                    <div class="badge badge-danger"><?= $rota->status ?></div>
                                                              <?php } ?>
                                                            </td>
                                                            <td>
                                                                <a href="<?= $router->route('admin.detalherota', ['id'=>$rota->id]) ?>" class="btn btn-icon icon-left btn-info"><i class="fas fa-info-circle"></i>Ver Mais</a>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; endif;?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                <div class="tab-pane fade" id="pagamentos" role="tabpanel" aria-labelledby="profile-tab2">
                                    <div class="card-header">
                                        <h4>Pagamentos do <?= $login->nome ?></h4>
                                    </div>

                                    <div class="card-body">

                                        <div class="row mt-4">
                                            <div class="col-md-12">
                                                <div class="table-responsive">
                                                    <table class="table table-striped dataTable no-footer" id="table-1" style="width:100%;">
                                                        <thead>
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>Produto</th>
                                                            <th>Data</th>
                                                            <th>Valor</th>
                                                            <th>Status</th>
                                                            <th>Opções</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php if(!empty($pagamentos)): foreach ($pagamentos as $pagamento): if ($pagamento->status == "F"){$pagamento->status = "Finalizado";}elseif ($pagamento->status == "A"){$pagamento->status = "Andamento";}else{$pagamento->status = "Cancelado";} ?>
                                                            <tr>
                                                                <td><?= $pagamento->id ?></td>
                                                                <td><?= $pagamento->nome ?></td>
                                                                <td><?= $pagamento->date ?></td>
                                                                <td>R$:<?=number_format($pagamento->valor,2,",",".") ?></td>
                                                                <td><?php if ($pagamento->status == "Finalizado"){ ?>
                                                                        <div class="badge badge-success"><?= $pagamento->status ?></div>
                                                                  <?php } elseif ($pagamento->status == "Andamento"){  ?>
                                                                        <div class="badge badge-info"><?= $pagamento->status ?></div>
                                                                  <?php } else{ ?>
                                                                        <div class="badge badge-danger"><?= $pagamento->status ?></div>
                                                                  <?php } ?>
                                                                </td>
                                                                <td>
                                                                    <a href="<?= $router->route('admin.desativarota', ['id'=>$rota->id]) ?>" class="btn btn-icon icon-left btn-danger"><i class="fas fa-times"></i>Cancelar</a>
                                                                </td>
                                                            </tr>
                                                        <?php endforeach; endif;?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="row">
                                                    <?php if ($conta): foreach ($conta as $cont): ?>
                                                    <div class="col-lg-8">
                                                        <div class="section-title">Conta para Transferencia</div>
                                                        <b>Nome: <?= $cont->nome ?></b><br>
                                                        <b>Conta: <?= $cont->conta ?></b><br>
                                                        <b>Agencia: <?= $cont->agencia ?></b><br>
                                                        <b>Tipo Conta: <?= $cont->tipo_conta ?></b><br>
                                                        <b>CPF: <?= $cont->cpf ?></b>
                                                    </div>
                                                    <?php endforeach; endif;  ?>
                                                    <div class="col-lg-4 text-right">
                                                         <?php if(!empty($pag)): foreach ($pag as $pags): ?>
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
                                                         <?php endforeach; endif;?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


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