<img id="bandeira"src="/Assets/images/bandeira1.png" alt="">
<div id="div_btns">
    <a href="/veiculos"><button id="bnt_cadastro">Voltar</button></a><br><br>
</div>
<legend id="fieldset_cadastro">Cadastro de Abastecimento </legend>
<form action="" method="POST">
    <div id="inputs_left" >
        <select name="tb_fornecedor_id_fornecedor" id="fornecedor">
            <option value="">Selecione o Fornecedor</option>
            <?php foreach($fornecedor as $info):?>
                <option value="<?php echo $info["id_fornecedor"];?>" name="fornecedor"><?php echo $info["razao_social"];?></option>
            <?php endforeach;?>
        </select><br><br>

        <select name="id_veiculo" id="veiculo">
            <option value="">Selecione o Veículo</option>
            <?php foreach($veiculos as $info):?>
                <option value="<?php echo $info["id_veiculo"];?>" name="item"><?php echo $info["placa"];?></option>
            <?php endforeach;?>
        </select><br><br>

        <input type="number" step=0.001 name="kilometragem" required placeholder="Km Abastecimento"><br><br>
        <label for="data_abastecimento" id="data_entrada">Dia Abastecido :</label>
        <input type="datetime-local" value="2017-06-01T08:30" name="data_abastecimento" placeholder="test"><br><br>
    </div>

    <div id="inputs_right">
        <input type="text" name="tipo_combustivel" required placeholder="Tipo do Combustível"><br><br>
        <input type="number" step=0.01 name="valor_litro" required placeholder="Valor do Litro ex: 3.50"><br><br>
        <input type="number" step=0.01 name="litros_abastecidos" required placeholder="Quantidade de litros Abastecidos  ex:10"><br><br>
    </div>
    <a href="/veiculos"><button>Enviar</button></a><br><br><br>
</form>
<?php 

// echo 
//     "<br>veiculo:" . $_POST["id_veiculo"] . 
//     "<br>data:" . $_POST["data_abastecimento"] .
//     "<br>tipo do combustive:" . $_POST["tipo_combustivel"] .
//     "<br>valor Total:" . "R$". number_format(($_POST["valor_litro"] * $_POST["litros_abastecidos"]), 2, ",", ","). 
//     "<br>litros_abastecidos:" . $_POST["litros_abastecidos"] .
//     "<br>Valor do litro:" . $_POST["valor_litro"] .
//     "<br>Km:" . $_POST["kilometragem"] .
//     "<br>fornecedor:". $_POST["tb_fornecedor_id_fornecedor"];

