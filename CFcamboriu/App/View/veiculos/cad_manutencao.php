<img id="bandeira"src="/Assets/images/bandeira1.png" alt="">
<div id="div_btns">
    <a href="/veiculos"><button id="bnt_cadastro">Voltar</button></a><br><br>
</div>

<legend id="fieldset_cadastro">Cadastro de Manutenções </legend>
<form action="" method="POST">
    <div id="inputs_left">
        <label for="tb_fornecedor_id_fornecedor">Fonecedor</label><br>
        <select name="tb_fornecedor_id_fornecedor" id="fornecedor">
            <option value="">Selecione o Fornecedor</option>
            <?php foreach($fornecedor as $info):?>
                <option value="<?php echo $info["id_fornecedor"];?>" name="fornecedor"><?php echo $info["codigo_fornecedor"];?></option>
            <?php endforeach;?>
        </select><br><br>

        <label for="id_veiculo">Veículo</label><br>
        <select name="tb_veiculos_id_veiculo" id="veiculo">
            <option value="">Selecione o Veículo</option>
            <?php foreach($veiculos as $info):?>
                <option value="<?php echo $info["id_veiculo"];?>" name="item"><?php echo $info["placa"];?></option>
            <?php endforeach;?>
        </select><br><br>

        <label for="data_entrada">Data de Entrada</label><br>
        <input type="datetime-local" name="data_entrada" required placeholder="Data da Entrada"><br><br>

        <label for="data_saida">Data da Saída</label><br>
        <input type="datetime-local" name="data_saida" required placeholder="Data da Saída"><br><br>
    </div>

    <div id="inputs_right">
    <label for="descricao_servico">Descrição do Serviço</label><br>
        <input type="text" name="descricao_servico" required placeholder="Descrição do Serviço"><br><br>

        <label for="observacoes">Observações</label><br>
        <input type="text" name="observacoes"placeholder="Observações"><br><br>

        <label for="valor_gasto">Valor Gasto</label><br>
        <input type="number" step=0.01 name="valor_gasto" required placeholder="Valor Gasto"><br><br>
    </div><br><br><br>
    <a href=""><button>Enviar</button></a><br><br><br>
</form>

<?php 

// echo 
//     "<br>fornecedor:" . $_POST["tb_fornecedor_id_fornecedor"] . 
//     "<br>veiculo:" . $_POST["tb_veiculos_id_veiculo"] .
//     "<br>data_entrada:" . $_POST["data_entrada"] .
//     "<br>data_saida:" . $_POST["data_saida"] .
//     "<br>descricao:" . $_POST["descricao_servico"] .
//     "<br>observacao:" . $_POST["observacoes"] .
//     "<br>valor_gasto:" . $_POST["valor_gasto"] .
//     "<br>fornecedor:". $_POST["tb_fornecedor_id_fornecedor"];

