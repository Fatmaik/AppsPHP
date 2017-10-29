<img id="bandeira" src="/Assets/images/bandeira1.png" alt="">
<div id="div_btns">
<?php if($_SESSION['nivel'] == 5):?>
    <a href="condutores/cad_condutores"><button id="bnt_cadastro"> Cadastrar Condutores</button></a>
<?php endif;?>
</div><br><br>

<legend>Condutores</legend>
<table colspan='3'>
    <tr>
        <th>Nome do Condutor</th>
        <th>Numero da Habilitação</th>
        <th>Categoria</th>
        <th>Data de Vencimento da Habilitaçao</th>
    </tr>
    <?php foreach($condutores as $info): ?>
    <tr>
        <td><?php echo $info['nome']; ?></td>
        <td><?php echo $info['habilitacao']; ?></td>
        <td><?php echo $info['categoria']; ?></td>
        <td><?php echo date('d/m/Y', strtotime($info['data_vencimento'])); ?></td>
    </tr>
    <?php endforeach;?>
</table>
