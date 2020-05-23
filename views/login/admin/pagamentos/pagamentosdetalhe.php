<?php $v->layout("admin/theme");

$email = 'formatacaoumuarama@gmail.com';
$token = '1045640749614566A06AA642AD42B89E';

$Code=filter_input(INPUT_GET,'code',FILTER_SANITIZE_SPECIAL_CHARS);
$Url="https://ws.sandbox.pagseguro.uol.com.br/v3/transactions/{$Code}?email=".$email."&token=".$token."";

$Curl=curl_init($Url);
curl_setopt($Curl,CURLOPT_SSL_VERIFYPEER,true);
curl_setopt($Curl,CURLOPT_RETURNTRANSFER,true);
$Retorno=curl_exec($Curl);
curl_close($Curl);
$xml=simplexml_load_string($Retorno);

foreach ($xml->items as $Item) {
  foreach ($Item as $Itens) {
  }
}
foreach ($xml->sender as $user){
  foreach ($user->phone as $item) {
  }
}
foreach ($xml->shipping as $adress) {
  foreach ($adress->address as $itens) {

  }
}
?>

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
                   aria-selected="true">Detalhes Pagamento</a>
              </li>
            </ul>
            <div class="tab-content tab-bordered" id="myTab3Content">
                <div class="tab-content tab-bordered" id="myTab3Content">
                    <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="home-tab2">
                        <section>
                            <h4>Nome do Comprador: <?= $user->name ?></h4>
                            <h6>E-mail do Comprador: <?= $user->email ?> | Celular:(<?= $item->areaCode ?>)<?= $item->number ?></h6>
                            <h6>Descrição:<?= $Itens->description ?> | Quantidade:<?= $Itens->quantity ?> | Valor:<?= $Itens->amount ?></h6>
                            <h6>Rua:<?= $itens->street ?> | Número:<?= $itens->number ?> | Complemento:<?= $itens->complement ?></h6>
                            <h6>Distrito:<?= $itens->district ?> | Cidade:<?= $itens->city ?> | Estado:<?= $itens->state ?></h6>

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
                            <input type="hidden" id="codee" name="codee" value="<?= $venda->code ?>">
                            <h6>Status:
                                 <?php if ($venda->status == "Aguardando pagamento"){ ?>
                                          <div class="badge badge-white"><?= $venda->status ?></div>
                                    <?php } elseif ($venda->status == "Em análise"){  ?>
                                          <div class="badge badge-warning"><?= $venda->status ?></div><br><br>
                                         <button name="cancelar" class="btn btn-icon icon-left btn-danger"><i class="fas fa-check"></i>Cancelar Pagamento</button>
                                    <?php } elseif ($venda->status == "Paga"){  ?>
                                          <div class="badge badge-secondary"><?= $venda->status ?></div>
                                          <button name="devolver" class="btn btn-icon icon-left btn-danger"><i class="fas fa-check"></i>Devolver Pagamento</button>
                                    <?php } elseif ($venda->status == "Disponível"){  ?>
                                          <div class="badge badge-success"><?= $venda->status ?></div>
                                          <button name="devolver" class="btn btn-icon icon-left btn-danger"><i class="fas fa-check"></i>Devolver Pagamento</button>
                                    <?php } elseif ($venda->status == "Em disputa"){  ?>
                                          <div class="badge badge-info"><?= $venda->status ?></div>
                                          <button name="devolver" class="btn btn-icon icon-left btn-danger"><i class="fas fa-check"></i>Devolver Pagamento</button>
                                    <?php } elseif ($venda->status == "Devolvida"){  ?>
                                          <div class="badge badge-dark"><?= $venda->status ?></div>
                                    <?php } elseif ($venda->status == "Cancelada"){  ?>
                                          <div class="badge badge-danger"><?= $venda->status ?></div>
                                    <?php } elseif ($venda->status == "Debitado"){  ?>
                                          <div class="badge badge-primary"><?= $venda->status ?></div>
                                    <?php } elseif ($venda->status == "Retenção temporária"){  ?>
                                          <div class="badge badge-transparent"><?= $venda->status ?></div>
                                          <button name="devolver" class="btn btn-icon icon-left btn-danger"><i class="fas fa-check"></i>Devolver Pagamento</button>
                                    <?php } ?> <?php endforeach; endif;?> </h6>

                        </section>
                    </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- Button trigger modal -->
<button type="button" name="modal" class="btn btn-primary">
    Launch static backdrop modal
</button>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="swal-icon swal-icon--success">
                    <span class="swal-icon--success__line swal-icon--success__line--long"></span>
                    <span class="swal-icon--success__line swal-icon--success__line--tip"></span>

                    <div class="swal-icon--success__ring"></div>
                    <div class="swal-icon--success__hide-corners"></div>
                </div>
            </div>
            <div class="swal-title" >Atenção!!!</div>
            <div class="swal-text">Pagamento Cancelado</div>
            <div class="swal-footer">
                <div class="swal-button-container">
                    <button class="swal-button swal-button--confirm" name="ok">OK</button>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $("button[name='modal']").click(function(){
            $('#staticBackdrop').modal()
        });
        $("button[name='ok']").click(function(){
            $('#staticBackdrop').modal('hide')
        });
    });

</script>

<script>
        $(document).ready(function(){
            var id = $("#codee").val();
            $("button[name='cancelar']").click(function(){
                $.ajax({
                    method: "POST",
                    url: "https://melevaprojeto.tk/admin/cancelarpagamento",
                    data: {'id': id},
                    success: function(retorna){
                        console.log("Sucesso " + JSON.stringify(retorna));
                        $('#staticBackdrop').modal();
                        $("button[name='ok']").click(function(){
                            location.reload();
                        });
                    },
                    error: function(retorna){
                        console.log("Erro" + JSON.stringify(retorna));
                        $("#msg").html('<p style="color: #FF0000">Erro ao realizar a transação</p>')
                    }
                });
            });
            $("button[name='devolver']").click(function(){
                $.ajax({
                    method: "POST",
                    url: "https://melevaprojeto.tk/admin/devolverpagamento",
                    data: {'id': id},
                    success: function(retorna){
                        console.log("Sucesso " + JSON.stringify(retorna));
                        $('#staticBackdrop').modal();
                        $("button[name='ok']").click(function(){
                            location.reload();
                        });
                    },
                    error: function(retorna){
                        console.log("Erro" + JSON.stringify(retorna));
                        $("#msg").html('<p style="color: #FF0000">Erro ao realizar a transação</p>')
                    }
                });
            });
        });

</script>