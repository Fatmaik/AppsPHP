<img id="bandeira"src="<?php echo base_url('/assets/images/bandeira1.png')?>" alt="">
<div id="div_btns">
    <a href="/veiculos"><button id="bnt_cadastro">Voltar</button></a><br><br>
</div>
<legend id="fieldset_cadastro">Cadastro de Veículos </legend>
<form action="" method="POST">
    <div id="inputs_left">
        <label for="modelo">Modelo</label><br>
        <input type="text" name="modelo" required placeholder="ex: Palio"><br><br>

        <label for="placa">Placa</label><br>
        <input type="text" name="placa" required placeholder="Placa"><br><br>

        <label for="marca">Marca</label><br>
        <input type="text" name="marca" required placeholder="ex: Fiat"><br><br>
    </div>
    <div id="inputs_right">
        <label for="chassi">Chassi</label><br>
        <input type="text" name="chassi" required placeholder="Chassi"><br><br>

        <label for="ano">Ano</label><br>
        <input type="text" name="ano" required placeholder="ex: 2016"><br><br>
    </div>
    <a href="/veiculos"><button>Enviar</button></a><br><br>
</form>
