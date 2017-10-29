<img id="bandeira"src="/Assets/images/bandeira1.png" alt="">
<div id="div_btns">
    <a href="/veiculos"><button id="bnt_cadastro">Voltar</button></a><br><br>
</div>
<legend id="fieldset_cadastro">Cadastro de Manutenções</legend>
<form action="" method="POST">
    <div id="inputs_left">
        
        <label for="id_veiculo">Veículo</label><br>
        <select name="id_veiculo" id="veiculo">
            <option value="">Selecione o Veículo</option>
            <?php foreach($veiculos as $info):?>
                <option value="<?php echo $info["id_veiculo"];?>" name="item"><?php echo $info["placa"];?></option>
            <?php endforeach;?>
        </select><br><br>

        <label for="id_veiculo">Fornecedor</label><br>
        <select name="id_fornecedor" id="veiculo">
            <option value="">Selecione o Fornecedor</option>
            <?php foreach($fornecedores as $info):?>
                <option value="<?php echo $info["id_fornecedor"];?>" name="item"><?php echo $info["codigo_fornecedor"];?></option>
            <?php endforeach;?>
        </select><br><br>

        <label for="data_entrada">Data de Entrada</label><br>
        <input type="datetime-local" name="data_entrada" required><br><br>

        <label for="data_saida">Data de Saída</label><br>
        <input type="datetime-local" name="data_saida" required><br><br>

    </div>

    <div id="inputs_right">
        <label for="odometro_manutencao">Odometro</label><br>
        <input type="number" step=0.001 name="odometro_manutencao" required><br><br>

        <label for="valor_gasto">Valor</label><br>
        <input type="number" step=0.01 name="valor_gasto" required><br><br>

        <label for="descricao_servico">Descrição da Manutenção</label><br>
        <input type="text" name="descricao_servico" required placeholder="ex: troca de óleo"><br><br>

        <label for="observacoes">Observações</label><br>
        <input type="text" name="observacoes" required placeholder="ex: avisos do fornecedor"><br><br>

    </div><br><br><br>
    <a href="/veiculos"><button>Enviar</button></a><br><br><br>
</form>