<img id="bandeira"src="/Assets/images/bandeira1.png" alt="">
<div id="div_btns">
    <a href="/encargos"><button id="bnt_cadastro">Voltar</button></a><br><br>
</div>
<legend id="fieldset_cadastro">Cadastro de Multas </legend>
<form action="" method="POST" enctype="multipart/form-data">
    <div id="inputs_left">
        <label for="data">Data da Multa</label><br>
        <input type="datetime-local" name="data" required><br><br>

        <label for="infracao">Datas de Reservas</label><br>
        <select name="tb_reserva_id_reserva" id="veiculo">
            <option value="">Datas de reservas semelhantes</option>
            <?php foreach($reservas as $info):?>
                <option value="<?php echo $info["id_reserva"];?>" name="item"><?php echo $info["data_saida"];?></option>
            <?php endforeach;?>
        </select><br><br>

        <label for="id_veiculo">Veículo</label><br>
        <select name="placa" id="veiculo">
            <option value="">Selecione o Veículo</option>
            <?php foreach($veiculos as $info):?>
                <option value="<?php echo $info["placa"];?>" name="item"><?php echo $info["placa"];?></option>
            <?php endforeach;?>
        </select><br><br>

        <label for="valor">Valoe da Multa</label><br>
        <input type="number" step=0.01 name="valor" required placeholder="ex: 100,00"><br><br>

    </div>

    <div id="inputs_right">
        <label for="local">Local da Infração</label><br>
        <input type="text" name="local" required><br><br>

        <label for="nivel">Nível da Infração</label><br>
        <input type="text" name="nivel" required placeholder="grave"><br><br>

        <label for="infracao">Descrição da Infração</label><br>
        <input type="text" name="infracao" required><br><br>

        <label for="pdf_multa">PFD da Multa</label><br>
        <input type="file">
    
    </div><br><br><br>
    <a href="/encargos"><button>Enviar</button></a><br><br><br>
</form>

