<img id="bandeira"src="/Assets/images/bandeira1.png" alt="">
<div id="div_btns">
    <a href="/condutores"><button id="bnt_cadastro">Voltar</button></a><br><br>
</div>

<legend id="fieldset_cadastro">Cadastro de Condutores </legend>
<form action="" method="POST">
    <div id="inputs_left">
        <label for="nome">Nome</label></label><br>
        <input type="text" name="nome" required><br><br>

        <label for="habilitacao">Habilitação</label><br>
        <input type="text" name="habilitacao" required placeholder="número do registro"><br><br>
    </div>
    <div id="inputs_right">
        <label for="categoria">Categoria</label></label><br>
        <input type="text" name="categoria" required placeholder="ex:AB"><br><br>

        <label for="data_vencimento">Data de Vencimento</label></label><br>
        <input type="date" name="data_vencimento" required><br><br>

    </div><br><br><br>
    <a href="/reserva"><button>Enviar</button></a><br><br>
</form>
