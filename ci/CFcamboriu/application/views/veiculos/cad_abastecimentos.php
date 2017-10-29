<img id="bandeira"src="/Assets/images/bandeira1.png" alt="">
<div id="div_btns">
    <a href="/veiculos"><button id="bnt_cadastro">Voltar</button></a><br><br>
</div>
<legend id="fieldset_cadastro">Cadastro de Abastecidos</legend>
<form action="" method="POST">
    <div id="inputs_left">
        
        <label for="id_veiculo">Veículo</label><br>
        <select name="id_veiculo" id="veiculo">
            <option value="">Selecione o Veículo</option>
            <?php foreach($veiculos as $info):?>
                <option value="<?php echo $info["id_veiculo"];?>" name="item"><?php echo $info["placa"];?></option>
            <?php endforeach;?>
        </select><br><br>

        <label for="id_fornecedor">Fornecedor</label><br>
        <select name="id_fornecedor" id="veiculo">
            <option value="">Selecione o Fornecedor</option>
            <?php foreach($fornecedores as $info):?>
                <option value="<?php echo $info["id_fornecedor"];?>" name="item"><?php echo $info["codigo_fornecedor"];?></option>
            <?php endforeach;?>
        </select><br><br>

        <label for="odometro">Odômetro</label><br>
        <input type="number" step="any" name="odometro" required><br><br>

        <label for="data_abastecimento">Data do Abastecimento</label><br>
        <input type="datetime-local" name="data_abastecimento" required><br><br>
        
    </div>
    <div id="inputs_right">
        <label for="tipo_combustivel">Fornecedor</label><br>
        <select name="tipo_combustivel" id="veiculo">
            <option value="Gasolina Comum">Gasolina Comum</option>
            <option value="Gasolina Aditivada">Gasolina Aditivada</option>
            <option value="Álcool">Álcool</option>
            <option value="Diesel">Diesel</option>
            <option value="Gás">Gás</option>
        </select><br><br>

        <label for="valor_litro">Valor do Litro</label><br>
        <input type="number" step=0.01 name="valor_litro" required><br><br>

        <label for="litros_abastecidos">Litros Abastecidos</label><br>
        <input type="number" name="litros_abastecidos" required><br><br>

        <label for="tanque_cheio">Tanque Cheio</label><br>
        <select name="tanque_cheio" id="veiculo">
            <option value="Sim">Simr</option>
            <option value="Nao">Não</option>
        </select><br><br>

    </div><br><br><br>
    <a href="/abastecimentos"><button>Enviar</button></a><br><br><br>
</form>
