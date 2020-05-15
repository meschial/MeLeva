<?php $v->layout("admin/theme");?>
<div class="card-header">
    <h4>Detalhe da Rota</h4>
</div>
    <div class="form-row">
        <div class="form-group col-md-4">
            <label>Cep Origem:</label>
            <input type="text" id="cep" class="form-control" value="<?= $rotas->cep_inicio ?>" name="cep_inicio">
        </div>
        <div class="form-group col-md-4">
            <label>Cep Destino:</label>
            <input type="text" id="cep2" class="form-control" value="<?= $rotas->cep_inicio ?>" name="cep_fim">
        </div>
        <div class="form-group col-md-4">
            <label>Valor Un:</label>
            <input type="text" class="form-control" value="<?= $rotas->valor ?>" name="valor">
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-4">
            <label>Cidade Origem:</label>
            <input type="text" id="cidade" readonly class="form-control" value="<?= $rotas->cidade_inicio ?>" name="cidade_inicio">
        </div>
        <div class="form-group col-md-4">
            <label>Cidade Destino:</label>
            <input type="text" id="cidade2" readonly class="form-control" value="<?= $rotas->cidade_fim ?>" name="cidade_fim">
        </div>
        <div class="form-group col-md-4">
            <label>Quantidade:</label>
            <input type="text" class="form-control" value="<?= $rotas->quantidade ?>" name="quantidade">
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-4">
            <label>Data Inicio:</label>
            <input type="date" class="form-control" value="<?= $rotas->data_inicio ?>" name="data_inicio">
        </div>
        <div class="form-group col-md-4">
            <label>Descrição:</label>
            <input type="text" class="form-control" value="<?= $rotas->descricao ?>" name="descricao">
        </div>
        <div class="form-group col-md-4">
          <?php if ($rotas->status == "F"){$rotas->status = "Finalizada";}elseif ($rotas->status == "A"){$rotas->status = "Andamento";}else{$rotas->status = "Cacelada";}?>
          <?php if ($rotas->status == "Finalizada"){ ?>
              <div class="badge badge-success"><?= $rotas->status ?></div>
          <?php } elseif ($rotas->status == "Andamento"){  ?>
              <div class="badge badge-info"><?= $rotas->status ?></div>
          <?php } else{ ?>
              <div class="badge badge-danger"><?= $rotas->status ?></div>
          <?php } ?>
        </div>
    </div>

    <div>
        <a class="btn btn-primary btn-lg btn-block active" href="JavaScript: window.history.back();">Voltar</a>
    </div>

