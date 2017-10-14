<img id="bandeira"src="/Assets/images/bandeira1.png" alt="">
<div id="div_btns">
    <a href="/veiculos"><button id="bnt_cadastro">Voltar</button></a><br><br>
</div>
<legend id="fieldset_cadastro">Cadastro de Manutenções </legend>
<form action="" methos="POST">
    <div id="inputs_left">
        <select name="tb_fornecedor_id_fornecedor" id="fornecedor">
            <option value="">Selecione o Fornecedor</option>
            <?php foreach($fornecedor as $info):?>
                <option value="<?php echo $info["id_fornecedor"];?>" name="fornecedor"><?php echo $info["razao_social"];?></option>
            <?php endforeach;?>
        </select><br><br>

        <select name="tb_veiculos_id_veiculo" id="veiculo">
            <option value="">Selecione o Veículo</option>
            <?php foreach($veiculos as $info):?>
                <option value="<?php echo $info["id_veiculo"];?>" name="item"><?php echo $info["placa"];?></option>
            <?php endforeach;?>
        </select><br><br>
        <label for="data_entrada" id="data_entrada">Data de Entrada:</label>
        <input type="date" name="data_entrada" required placeholder="Data da Entrada"><br><br>
        <label for="data_saida" id="data_saida">Data de Saída:</label>
        <input type="date" name="data_saida" required placeholder="Data da Saída"><br><br>
    </div>

    <div id="inputs_right">
        <input type="text" name="descricao_servico" required placeholder="Descrição do Serviço"><br><br>
        <input type="text" name="observacoes" required placeholder="Observações"><br><br>
        <input type="number" step=0.01 name="valor_gasto" required placeholder="Valor Gasto"><br><br> 
    </div><br><br><br>
    <a href="/veiculos"><button>Enviar</button></a><br><br><br>
</form>