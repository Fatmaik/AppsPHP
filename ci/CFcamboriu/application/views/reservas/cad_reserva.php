<img id="bandeira"src="/Assets/images/bandeira1.png" alt="">
<div id="div_btns">
    <a href="/reservas"><button id="bnt_cadastro">Voltar</button></a>
</div>
<p><?php echo $existente;?></p>
<legend id="fieldset_cadastro">Cadastro de Reservas</legend>
<form action="" method="POST">
    <div id="inputs_left" >
        <label for="id_condutor">Condutor</label><br>
        <select name="id_condutor" id="condutorr">
            <option value="100">Selecione o Condutor</option>
            <?php foreach($condutores as $info):?>
                <option value="<?php echo $info["id_condutor"];?>" name="fornecedor"><?php echo $info["nome"];?></option>
            <?php endforeach;?>
        </select><br><br>

        <label for="id_veiculo">Veículo</label><br>
        <select name="id_veiculo" id="veiculo">
            <option value="">Selecione o Veículo</option>
            <?php foreach($veiculos as $info):?>
                <option value="<?php echo $info["id_veiculo"];?>" name="item"><?php echo $info["placa"];?></option>
            <?php endforeach;?>
        </select><br><br>

        <label for="km_inicial">Odómetro Inicial</label><br>
        <input type="number" step=0.001 name="km_inicial" required placeholder="Km Inicio"><br><br>

        <label for="periodo_reservado">Perído de Reserva</label><br>
        <input type="text" name="periodo_reservado" required placeholder="ex: 2 dias"><br><br>

        <label for="destino">Destino</label><br>
        <input type="text" name="destino" placeholder="campo não obrigatório"><br><br>
    </div>

    <div id="inputs_right">
        <label for="secretaria">Secretaría</label><br>
        <input type="text"name="secretaria" required placeholder="Secretaría"><br><br>

        <label for="funcionario">Nome do Funcionário</label><br>
        <input type="text" name="funcionario" required placeholder="condutor ou responsável"><br><br>

        <label for="tipo_reserva">Tipo da Reserva</label><br>
        <select name="tipo_reserva" id="">
            <option value="Comum">Comum</option>
            <option value="Viagem">Viagem</option>
            <option value="Manutenção">Manuteção</option>
        </select><br><br>

        <label for="data_saida">Data/hora da reserta</label><br>
        <input type="datetime-local" name="data_saida"><br><br>

    </div>
    <a href="/reservas"><button>Enviar</button></a><br><br><br>
</form>

<?php
// $dados_insert = array(
//                 "id_veiculo"=>$_POST["id_veiculo"],
//                 "km_inicial"=>$_POST["km_inicial"],
//                 "periodo_reservado"=>$_POST["periodo_reservado"],
//                 "secretaria"=> $_POST["secretaria"],
//                 "funcionario"=>$_POST["funcionario"],
//                 "tipo_reserva"=>$_POST["tipo_reserva"],
//                 "data_saida"=>$_POST["data_saida"],
//                 "condutores_id_condutor"=>$_POST["condutores_id_condutor"]
//             );

// var_dump($dados_insert);