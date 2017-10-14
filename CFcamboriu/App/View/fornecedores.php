<img id="bandeira" src="/Assets/images/bandeira1.png" alt=""><br><br>
<div id="div_btns">
    <a href="fornecedores/cad_fornecedores"><button id="bnt_cadastro"> Cadastrar fornecedores</button></a>
</div>
<legend>Fornecedores</legend>
<table colspan='3'>
    <tr>
        <th>Placa</th>
        <th>Marca</th>
        <th>Modelo</th>
        <th>Chassi</th>
        <th>Ano</th>
    </tr>
    <?php foreach($veiculos as $info): ?>
    <tr>
        <td><?php echo $info['placa']; ?></td>
        <td><?php echo $info['marca']; ?></td>
        <td><?php echo $info['modelo']; ?></td>
        <td><?php echo $info['chassi']; ?></td>
        <td><?php echo $info['ano']; ?></td>
    </tr>
    <?php endforeach;?>
</table>
