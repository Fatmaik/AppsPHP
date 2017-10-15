<img id="bandeira" src="/Assets/images/bandeira1.png" alt="">
<div id="div_btns">
    <a href="encargos/cad_multas"><button id="bnt_cadastro"> Cadastrar Multas</button></a>
    <a href="encargos/cad_licenciamentos"><button id="bnt_cadastro"> Cadastrar Licenciamento</button></a><br><br>
</div>
<legend>Encargos</legend>
<table colspan='3'>
    <tr>
        <th>Data</th>
        <th>Placa</th>
        <th>Valor</th>
        <th>Descrição da Infração</th>
        <th>Nivel</th>
        <th>Local</th>
        <th>Infrator</th>
        <th>PDF da Multa</th>
    </tr>
    <?php foreach($encargos as $info): ?>
    <tr>
        <td><?php echo $info['data']; ?></td>
        <td><?php echo $info['placa']; ?></td>
        <td><?php echo $info['valor']; ?></td>
        <td><?php echo $info['infracao']; ?></td>
        <td><?php echo $info['nivel']; ?></td>
        <td><?php echo $info['local']; ?></td>
        <td><?php echo $info['tb_reserve_id']; ?></td>
        <td><?php echo $info['pdf_multa']; ?></td>
    </tr>
    <?php endforeach; ?>
</table>
