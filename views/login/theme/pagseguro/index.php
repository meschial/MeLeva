<?php
$v->layout("theme/theme");
include 'configuracao.php';
?>

<section class="jobs-area section-padding3">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="jobs-title">
                    <h1 style="color: #6c757d; text-align: center">CHECKOUT PAGSEGURO</h1>
                </div>
            </div>
        </div>
        <span id="msg"></span>
        <div class="row">
            <div class="col-lg-12">
                <div class="jobs-tab tab-item">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#recent" role="tab" aria-controls="home" aria-selected="true">Entrega</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#full-time" role="tab" aria-controls="profile" aria-selected="false">Comprador</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#part-time" role="tab" aria-controls="part-time" aria-selected="false">Endereço</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="contact-tab2" data-toggle="tab" href="#intern" role="tab" aria-controls="intern" aria-selected="false">Nº Cartão</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <form name="formPagamento" action="" id="formPagamento">
        <div class="row">
            <div class="col-lg-12">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="recent" role="tabpanel" aria-labelledby="home-tab">
                        <div class="single-job mb-8 justify-content-between">
                            <div class="job-text">
                                <h4>Endereço para Entrega do produto</h4>

                                <input type="hidden" name="shippingAddressRequired" id="shippingAddressRequired" value="true">

                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label>Logradouro</label>
                                            <input type="text" class="form-control" name="shippingAddressStreet" id="shippingAddressStreet" placeholder="Av. Rua" value="Av. Brig. Faria Lima">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Número</label>
                                            <input type="text" class="form-control" name="shippingAddressNumber" id="shippingAddressNumber" placeholder="Número" value="1384">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Complemento</label>
                                            <input type="text" class="form-control"  name="shippingAddressComplement" id="shippingAddressComplement" placeholder="Complemento" value="5o andar">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-8">
                                            <label>Bairro</label>
                                            <input type="text" class="form-control" name="shippingAddressDistrict" id="shippingAddressDistrict" placeholder="Bairro" value="Jardim Paulistano">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>CEP</label>
                                            <input type="text" class="form-control" name="shippingAddressPostalCode" id="shippingAddressPostalCode" placeholder="CEP sem traço" value="01452002">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-8">
                                            <label>Cidade</label>
                                            <input type="text" class="form-control" name="shippingAddressCity" id="shippingAddressCity" placeholder="Cidade" value="Sao Paulo">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Estado</label>
                                            <input type="text" class="form-control" name="shippingAddressState" id="shippingAddressState" placeholder="Sigla do Estado" value="SP">
                                        </div>
                                        <input type="hidden" name="shippingAddressCountry" id="shippingAddressCountry" value="BRL">
                                    </div>

                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="full-time" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="single-job mb-4 justify-content-between">
                            <div class="job-text">
                                <h4>Dados do Comprador</h4>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Nome</label>
                                        <input type="text" class="form-control" name="senderName" id="senderName" placeholder="Nome completo" value="Jose Comprador" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>E-mail</label>
                                        <input type="email" class="form-control" name="senderEmail" id="senderEmail" placeholder="E-mail do comprador" value="c66860546910556664625@sandbox.pagseguro.com.br" required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label>CPF</label>
                                        <input type="text" class="form-control" name="senderCPF" id="senderCPF" placeholder="CPF sem traço" value="22111944785" required>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>Data de Nascimento</label>
                                        <input type="text" class="form-control" name="creditCardHolderBirthDate" id="creditCardHolderBirthDate" placeholder="Data de Nascimento. Ex: 12/12/1912" value="27/10/1987" required>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>DDD</label>
                                        <input type="text" class="form-control" name="senderAreaCode" id="senderAreaCode" placeholder="DDD" value="11" required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Telefone</label>
                                        <input type="text" class="form-control" name="senderPhone" id="senderPhone" placeholder="Somente número" value="56273440" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="part-time" role="tabpanel" aria-labelledby="contact-tab">
                        <div class="single-job mb-4 justify-content-between">
                            <div class="job-text">
                                <h4>Endereço do dono do cartão</h4>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Logradouro</label>
                                        <input type="text" class="form-control" name="billingAddressStreet" id="billingAddressStreet" placeholder="Av. Rua" value="Av. Brig. Faria Lima" required>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>Número</label>
                                        <input type="text" class="form-control" name="billingAddressNumber" id="billingAddressNumber" placeholder="Número" value="1384" required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Complemento</label>
                                        <input type="text" class="form-control" name="billingAddressComplement" id="billingAddressComplement" placeholder="Complemento" value="5o andar">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Bairro</label>
                                        <input type="text" class="form-control" name="billingAddressDistrict" id="billingAddressDistrict" placeholder="Bairro" value="Jardim Paulistano">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>CEP</label>
                                        <input type="text" class="form-control" name="billingAddressPostalCode" id="billingAddressPostalCode" placeholder="CEP sem traço" value="01452002" required>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>Cidade</label>
                                        <input type="text" class="form-control" name="billingAddressCity" id="billingAddressCity" placeholder="Cidade" value="Sao Paulo" required>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>Estado</label>
                                        <input type="text" class="form-control" name="billingAddressState" id="billingAddressState" placeholder="Sigla do Estado" value="SP" required>
                                    </div>
                                    <input type="hidden" name="billingAddressCountry" id="billingAddressCountry" value="BRL">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="intern" role="tabpanel" aria-labelledby="contact-tab2s">
                        <div class="single-job mb-4 d-lg-flex justify-content-between">
                            <div class="job-text">
                                <h4>Dados do Cartão</h4>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label>Número do cartão</label>
                                        <input type="text" class="form-control" name="numCartao" id="numCartao" required>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>Bandeira cartão</label>
                                        <span class="bandeira-cartao" style="margin-left: 40%"></span>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>CVV do cartão</label>
                                        <input type="text" class="form-control" name="cvvCartao" id="cvvCartao" maxlength="3" value="123" required>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>Mês de Validade</label>
                                        <input type="text" class="form-control" name="mesValidade" id="mesValidade" maxlength="2" value="12" required>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>Ano de Validade</label>
                                        <input type="text" class="form-control" name="anoValidade" id="anoValidade" maxlength="4" value="2030" required>
                                    </div>
                                    <input type="hidden" name="bandeiraCartao" id="bandeiraCartao">
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label>Quantidades de Parcelas</label>
                                        <select name="qntParcelas" class="form-control" id="qntParcelas" class="select-qnt-parcelas">
                                            <option value="">Selecione</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Nome no Cartão</label>
                                        <input type="text" class="form-control" name="creditCardHolderName" id="creditCardHolderName" placeholder="Nome igual ao escrito no cartão" value="Jose Comprador" required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>CPF do dono do Cartão</label>
                                        <input type="text" class="form-control" name="creditCardHolderCPF" id="creditCardHolderCPF" placeholder="CPF sem traço" value="22111944785" required>
                                    </div>
                                    <input type="hidden" name="valorParcelas" id="valorParcelas">
                                    <input type="hidden" name="tokenCartao" id="tokenCartao">
                                    <input type="hidden" name="hashCartao" id="hashCartao">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single-job justify-content-between">
                    <div class="job-text">
                        <h4><b>CEP ORIGEM: <?= $rota->cep_inicio ?> / CEP DESTINO: <?= $rota->cep_fim ?></b></h4>
                        <ul class="mt-4">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Rota Contrada</label>
                                    <input readonly class="form-control" name="itemDescription1" id="itemDescription1" value="Cidade Origem: <?= $rota->cidade_inicio ?> / Destino: <?= $rota->cidade_fim ?>">
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Referencia</label>
                                    <input readonly class="form-control" name="reference" id="reference" value="<?=$venda->id ?>">
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Valor R$:</label>
                                    <input readonly class="form-control" value="<?= number_format($venda->valor, 2, ',', ''); ?>">
                                    <input type="hidden" class="form-control" name="itemAmount1" id="itemAmount1" value="<?= number_format($venda->valor, 2, '.', ''); ?>">
                                </div>
                                <div class="form-group col-md-1">
                                    <label>Qtde.</label>
                                    <input readonly class="form-control" name="itemQuantity1" id="itemQuantity1" value="1">
                                </div>

                            </div>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

            <input type="hidden" name="paymentMethod" id="paymentMethod" value="creditCard">
            <input type="hidden" name="receiverEmail" id="receiverEmail" value="<?php echo EMAIL_LOJA; ?>">
            <input type="hidden" name="currency" id="currency" value="<?php echo MOEDA_PAGAMENTO; ?>">
            <!--<input type="hidden" name="extraAmount" id="extraAmount" value="">-->
            <input type="hidden" name="itemId1" id="itemId1" value="0001">
            <input type="hidden" name="notificationURL" id="notificationURL" value="<?php echo URL_NOTIFICACAO; ?>">
            <input type="hidden" name="amount" id="amount" value="<?= number_format($venda->valor, 2, '.', ''); ?>">
            <input type="hidden" name="noIntInstalQuantity" id="noIntInstalQuantity" value="2">


        <div class="more-job-btn mt-5 text-center">
            <input type="submit" class="template-btn" name="btnComprar" id="btnComprar" value="Finalizar Pagamento">
        </div>
      </form>
    </div>
</section>




<!--<div class="meio-pag"></div>-->


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo SCRIPT_PAGSEGURO; ?>"></script>
<script>
    var amount = $('#amount').val();
    //var amount = "600.00";
    pagamento();

    function pagamento() {

        $.ajax({
            //URL completa do local do arquivo responsável em buscar o ID da sessão
            url: 'https://localhost/tcc/me/postp',
            type: 'POST',
            dataType: 'json',
            success: function (retorno) {

                //ID da sessão retornada pelo PagSeguro
                PagSeguroDirectPayment.setSessionId(retorno.id);
            },
            complete: function (retorno) {
                listarMeiosPag();
            }
        });
    }

    function listarMeiosPag() {
        PagSeguroDirectPayment.getPaymentMethods({
            amount: amount,
            success: function (retorno) {

                //Recuperar as bandeiras do cartão de crédito
                $('.meio-pag').append("<div>Cartão de Crédito</div>");
                $.each(retorno.paymentMethods.CREDIT_CARD.options, function (i, obj) {
                    $('.meio-pag').append("<span class='img-band'><img src='https://stc.pagseguro.uol.com.br" + obj.images.SMALL.path + "'></span>");
                });

                //Recuperar as bandeiras do boleto
                $('.meio-pag').append("<div>Boleto</div>");
                $('.meio-pag').append("<span class='img-band'><img src='https://stc.pagseguro.uol.com.br" + retorno.paymentMethods.BOLETO.options.BOLETO.images.SMALL.path + "'><span>");

                //Recuperar as bandeiras do débito online
                $('.meio-pag').append("<div>Débito Online</div>");
                $.each(retorno.paymentMethods.ONLINE_DEBIT.options, function (i, obj) {
                    $('.meio-pag').append("<span class='img-band'><img src='https://stc.pagseguro.uol.com.br" + obj.images.SMALL.path + "'></span>");
                });
            },
            error: function (retorno) {
                // Callback para chamadas que falharam.
            },
            complete: function (retorno) {
                // Callback para todas chamadas.
                //recupTokemCartao();
            }
        });
    }

    //Receber os dados do formulário, usando o evento "keyup" para receber sempre que tiver alguma alteração no campo do formulário
    $('#numCartao').on('keyup', function () {

        //Receber o número do cartão digitado pelo usuário
        var numCartao = $(this).val();

        //Contar quantos números o usuário digitou
        var qntNumero = numCartao.length;

        //Validar o cartão quando o usuário digitar 6 digitos do cartão
        if (qntNumero == 6) {

            //Instanciar a API do PagSeguro para validar o cartão
            PagSeguroDirectPayment.getBrand({
                cardBin: numCartao,
                success: function (retorno) {
                    $('#msg').empty();

                    //Enviar para o index a imagem da bandeira
                    var imgBand = retorno.brand.name;
                    $('.bandeira-cartao').html("<img src='https://stc.pagseguro.uol.com.br/public/img/payment-methods-flags/42x20/" + imgBand + ".png'>");
                    $('#bandeiraCartao').val(imgBand);
                    recupParcelas(imgBand);
                },
                error: function (retorno) {

                    //Enviar para o index a mensagem de erro
                    $('.bandeira-cartao').empty();
                    $('#msg').html("Cartão inválido");
                }
            });
        }
    });

    //Recuperar a quantidade de parcelas e o valor das parcelas no PagSeguro
    function recupParcelas(bandeira) {
        var noIntInstalQuantity = $('#noIntInstalQuantity').val();
        PagSeguroDirectPayment.getInstallments({

            //Valor do produto
            amount: amount,

            //Quantidade de parcelas sem juro
            maxInstallmentNoInterest: noIntInstalQuantity,

            //Tipo da bandeira
            brand: bandeira,
            success: function (retorno) {
                $.each(retorno.installments, function (ia, obja) {
                    $.each(obja, function (ib, objb) {

                        //Converter o preço para o formato real com JavaScript
                        var valorParcela = objb.installmentAmount.toFixed(2).replace(".", ",");

                        //Acrecentar duas casas decimais apos o ponto
                        var valorParcelaDouble = objb.installmentAmount.toFixed(2);

                        //Apresentar quantidade de parcelas e o valor das parcelas para o usuário no campo SELECT
                        $('#qntParcelas').show().append("<option value='" + objb.quantity + "' data-parcelas='" + valorParcelaDouble + "'>" + objb.quantity + " parcelas de R$ " + valorParcela + "</option>");
                    });
                });
            },
            error: function (retorno) {
                // callback para chamadas que falharam.
            },
            complete: function (retorno) {
                // Callback para todas chamadas.
            }
        });
    }

    //Enviar o valor parcela para o formulário
    $('#qntParcelas').change(function () {
        $('#valorParcelas').val($('#qntParcelas').find(':selected').attr('data-parcelas'));
    });

    //Recuperar o token do cartão de crédito
    $("#formPagamento").on("submit", function (event) {
        event.preventDefault();

        PagSeguroDirectPayment.createCardToken({
            cardNumber: $('#numCartao').val(), // Número do cartão de crédito
            brand: $('#bandeiraCartao').val(), // Bandeira do cartão
            cvv: $('#cvvCartao').val(), // CVV do cartão
            expirationMonth: $('#mesValidade').val(), // Mês da expiração do cartão
            expirationYear: $('#anoValidade').val(), // Ano da expiração do cartão, é necessário os 4 dígitos.
            success: function (retorno) {
                $('#tokenCartao').val(retorno.card.token);
            },
            error: function (retorno) {
                // Callback para chamadas que falharam.
            },
            complete: function (retorno) {
                // Callback para todas chamadas.
                recupHashCartao();
            }
        });
    });

    //Recuperar o hash do cartão
    function recupHashCartao() {
        PagSeguroDirectPayment.onSenderHashReady(function (retorno) {
            if (retorno.status == 'error') {
                console.log(retorno.message);
                return false;
            } else {
                $("#hashCartao").val(retorno.senderHash);
                var dados = $("#formPagamento").serialize();
                console.log(dados);


                $.ajax({
                    method: "POST",
                    url: "https://localhost/tcc/me/finalizar",
                    data: dados,
                    dataType: 'json',
                    success: function(retorna){
                        console.log("Sucesso " + JSON.stringify(retorna));
                        $("#msg").html('<p style="color: green">Transação realizada com sucesso</p>');
                    },
                    error: function(retorna){
                        console.log("Erro" + JSON.stringify(retorna));
                        $("#msg").html('<p style="color: #FF0000">Erro ao realizar a transação</p>')
                    }
                });
            }
        });
    }
</script>
</body>
</html>
