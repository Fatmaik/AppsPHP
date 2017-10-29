<img id="bandeira"src="/Assets/images/bandeira1.png" alt="">
<div id="div_btns">
    <a href="/encargos"><button id="bnt_cadastro">Voltar</button></a><br><br>
</div>
<legend id="fieldset_cadastro">Cadastro de Licenciamentos</legend>
<form action="" method="POST">
    <div id="inputs_left">
        
        <label for="id_veiculo">Veículo</label><br>
        <select name="id_veiculo" id="veiculo">
            <option value="">Selecione o Veículo</option>
            <?php foreach($veiculos as $info):?>
                <option value="<?php echo $info["id_veiculo"];?>" name="item"><?php echo $info["placa"];?></option>
            <?php endforeach;?>
        </select><br><br>

        <label for="RENAVAN">Renavan</label><br>
        <input type="text"name="RENAVAN" required><br><br>

    </div>

    <div id="inputs_right">
        <label for="vencimento">Vencimento</label><br>
        <input type="date" name="vencimento" required placeholder="Fornecedor do Serviço"><br><br>

        <label for="valor_total">Valor Total</label><br>
        <input type=number step=0.01 name="valor_total" required placeholder="ex: 500,00"><br><br>

        <!-- <label for="status_pagamento">Status do pagamento</label><br> -->
        <!-- <input type="text" name="status_pagamento" required placeholder="ex: pagamento pendente"><br><br> -->
    </div><br><br><br>
    <a href="/encargos"><button>Enviar</button></a><br><br><br>
</form>
