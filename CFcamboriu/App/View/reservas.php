<img id="bandeira" src="/Assets/images/bandeira1.png" alt="">
<div id="div_btns">
    <a href="reservas/cad_reserva"><button id="bnt_cadastro"> Cadastrar Reserva</button></a>
</div>
<legend>Reservas Comuns</legend>
<table colspan='3'>
    <tr>
        <th>Data de Reserva</th>
        <th>Codigo do Veiculo</th>
        <th>Tipo da Reserva</th>
        <th>Km Inicial</th>
        <th>Condutor</th>
        <th>Periodo Reservado</th>
        <th>Secretaria</th>
        <th>funcionario</th>
        <th>Destino</th>
    </tr>
    <?php foreach($reservas_comum as $info): ?>
    <tr>
        <td><?php echo $info["data_saida"]; ?></td>
        <td><?php echo $info["placa"]; ?></td>
        <td><?php echo $info['tipo_reserva']; ?></td>
        <td><?php echo $info['km_inicial']; ?></td>
        <td><?php echo $info['nome']; ?></td>
        <td><?php echo $info['periodo_reservado']; ?></td>
        <td><?php echo $info['secretaria']; ?></td>
        <td><?php echo $info['funcionario']; ?></td>
        <td><?php echo $info['destino']; ?></td>
    </tr>
    <?php endforeach; ?>
</table><br>

<?php

// print_r($reservas_comum);