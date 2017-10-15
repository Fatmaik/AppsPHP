<img id="bandeira" src="/Assets/images/bandeira1.png" alt="">
<div id="div_btns">
    <a href="fornecedores/cad_fornecedores"><button id="bnt_cadastro"> Cadastrar fornecedores</button></a>
</div>
<legend>Fornecedores</legend>
<table colspan='3'>
    <tr>
        <th>Nome</th>
        <th>Endereço</th>
        <th>Codigo do Fornecedor</th>
        <th>CNPJ</th>
        <th>Telefone</th>
        <th>Banco</th>
        <th>Agencia</th>
        <th>Conta</th>
    </tr>
    <?php foreach($fornecedores as $info): ?>
    <tr>
        <td><?php echo $info['nome']; ?></td>
        <td><?php echo $info['endereco']; ?></td>
        <td><?php echo $info['codigo_fornecedor']; ?></td>
        <td><?php echo $info['cnpj']; ?></td>
        <td><?php echo $info['telefone']; ?></td>
        <td><?php echo $info['banco']; ?></td>
        <td><?php echo $info['agencia']; ?></td>
        <td><?php echo $info['conta']; ?></td>
    </tr>
    <?php endforeach;?>
</table>

