<img id="bandeira"src="/Assets/images/bandeira1.png" alt="">
<div id="div_btns">
    <a href="/fornecedores"><button id="bnt_cadastro">Voltar</button></a><br><br>
</div>
<legend id="fieldset_cadastro">Cadastro de Fornecedores </legend>
<form action="" method="POST">
    <div id="inputs_left">
        <label for="nome">Nome</label><br>
        <input type="text" name="nome" required><br><br>

        <label for="ramo">Ramo</label><br>
        <input type="text" name="ramo" required><br><br>

        <label for="endereco">Endereço</label><br>
        <input type="text" name="endereco" required><br><br>

        <label for="codigo_fornecedor">Código do fornecedor</label><br>
        <input type="text" name="codigo_fornecedor" required placeholder="ex: Ipiranga 01"><br><br>

        <label for="cnpj">CNPJ</label><br>
        <input type="text" name="cnpj"><br><br>
    </div>
    <div id="inputs_right">
        <label for="telefone">Telefone</label><br>
        <input type="text" name="telefone"><br><br>

        <label for="banco">Banco</label><br>
        <input type="text" name="banco" value="nulo"><br><br>

        <label for="agencia">Agencia</label><br>
        <input type="text" name="agencia" value="nulo"><br><br>

        <label for="conta">Conta</label><br>
        <input type="text" name="conta" value="nulo"><br><br>
    </div><br><br><br>
    <a href="/fornecedores"><button>Enviar</button></a><br><br>
</form>
