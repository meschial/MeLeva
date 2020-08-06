<?php $v->layout("theme/rotas/rotas");

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


?>

<div class="col-lg-8">
    <div class="main-content">
        <div class="single-content1">
            <div class="single-job mb-4 justify-content-between">
                <div class="job-text">
                    <h1 style="color: #6c757d; text-align: center">Rotas Contratadas </h1>
                    <ul class="mt-4">
                        <div class="login_form_callback">
                            <?= flash(); ?>
                        </div>


                        <?php if (!empty($ativo) and (!empty($rotas))): foreach ($rotas as $rota)?>
                            <?php if ($rota->status === "3"){$status = "Pago";} ?>

                            <div class="main-content">
                            <div class="single-content1">
                        <?php foreach ($rotas as $rota):
                            ?>
                            <div class="single-job mb-4 d-lg-flex justify-content-between">
                                <div class="job-text">
                                    <h4><b>Produto: <?= $rota->nome ?></b></h4>
                                    <ul class="mt-4">
                                        <li class="mb-3"><h5>Descrição: <?= $rota->descricao?></h5></li>
                                        <li class="mb-3"><h5>Valor: <?= number_format($rota->valor,2,",",".");?></h5></li>
                                        <li class="mb-3"><h5>Status: <?= $status?></h5></li>
                                        <input type="text" id="codee" name="codee" value="<?= $rota->code ?>">
                                    </ul>
                                </div>
                            </div>
                            <div class="job-btn align-self-center">

                                <a href="<?= $router->route('app.motocancelarrota', ['id' => $rota->id]) ?>" class="btn btn-primary">Ver dados</a>
                                <button name="devolver" class="btn btn-icon icon-left btn-danger"><i class="fas fa-check"></i>Devolver Pagamento</button>

                            </div>
                        <?php endforeach; ?>

                            </div>
                            </div>

                        <?php endif; ?>
                    </ul>
                </div>
                <div>
                </div>
            </div>
        </div>
    </div>
</div>




<!-- Modal success-->
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

<!-- Modal error-->
<div class="modal fade" id="error" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="swal-icon swal-icon--error">
                <div class="swal-icon--error__x-mark">
                    <span class="swal-icon--error__line swal-icon--error__line--left"></span>
                    <span class="swal-icon--error__line swal-icon--error__line--right"></span>
                </div>
            </div>
            <div class="swal-title" >Atenção!!!</div>
            <div class="swal-text">Erro na tranzação</div>
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
            $('#error').modal()
        });
        $("button[name='ok']").click(function(){
            $('#error').modal('hide')
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
                    $('#error').modal()
                    $("button[name='ok']").click(function(){
                        $('#error').modal('hide')
                    });
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
                    $('#error').modal()
                    $("button[name='ok']").click(function(){
                        $('#error').modal('hide')
                    });
                }
            });
        });
    });

</script>
