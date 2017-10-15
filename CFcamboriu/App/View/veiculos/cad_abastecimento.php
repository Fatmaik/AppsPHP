<img id="bandeira"src="/Assets/images/bandeira1.png" alt="">
<div id="div_btns">
    <a href="/veiculos"><button id="bnt_cadastro">Voltar</button></a><br><br>
</div>
<legend id="fieldset_cadastro">Cadastro de Abastecimento </legend>

<form action="" method="POST">
    <div id="inputs_left" >
        <label for="tb_fornecedor_id_fornecedor">Fonecedor</label><br>
        <select name="tb_fornecedor_id_fornecedor" id="fornecedor">
            <option value="">Selecione o Fornecedor</option>
            <?php foreach($fornecedor as $info):?>
                <option value="<?php echo $info["id_fornecedor"];?>" name="fornecedor"><?php echo $info["codigo_fornecedor"];?></option>
            <?php endforeach;?>
        </select><br><br>

        <label for="id_veiculo">Veículo</label><br>
        <select name="id_veiculo" id="veiculo">
            <option value="">Selecione o Veículo</option>
            <?php foreach($veiculos as $info):?>
                <option value="<?php echo $info["id_veiculo"];?>" name="item"><?php echo $info["placa"];?></option>
            <?php endforeach;?>
        </select><br><br>

        <label for="kilometragem">kilometragem</label><br>
        <input type="number" step=0.001 name="kilometragem" required placeholder="Km Abastecimento"><br><br>

        <label for="data_abastecimento">Dia Abastecido</label><br>
        <input type="datetime-local" value="2017-06-01T08:30" name="data_abastecimento" placeholder="test"><br><br>
    </div>

    <div id="inputs_right">
        <label for="tipo_combustivel">Tipo do Combustível</label><br>
        <input type="text" name="tipo_combustivel" required placeholder="Tipo do Combustível"><br><br>

        <label for="valor_litro">Valor do Litro</label><br>
        <input type="number" step=0.01 name="valor_litro" required placeholder=" ex: 3.50"><br><br>

        <label for="litros_abastecidos">Quantidade de litros Abastecidos</label><br>
        <input type="number" step=0.01 name="litros_abastecidos" required placeholder="ex:10"><br><br>
    </div>
    <a href="/veiculos"><button>Enviar</button></a><br><br><br>
</form>
