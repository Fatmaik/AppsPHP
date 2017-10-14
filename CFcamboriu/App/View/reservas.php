<img id="bandeira" src="/Assets/images/bandeira1.png" alt=""><br><br>
<div id="div_btns">
    <a href="reservas/cad_reserva_comum"><button id="bnt_cadastro"> Cadastrar Reserva Comum</button></a>
    <a href="reservas/cad_reserva_viagem"><button id="bnt_cadastro"> Cadastrar Reserva para Viagem</button></a>
</div>
<legend>Reservas Comuns</legend>
<table colspan='3'>
    <tr>
        <th>Codigo do Veiculo</th>
        <th>Data</th>
        <th>Km Inicial</th>
        <th>Condutor</th>
        <th>Periodo Reservado</th>
        <th>Secretaria</th>
        <th>funcionario</th>
    </tr>
    <?php foreach($reservas_comum as $info): ?>
    <tr>
        <td><?php echo $info['id_veiculo']; ?></td>
        <td><?php echo $info['data']; ?></td>
        <td><?php echo $info['km_inicial']; ?></td>
        <td><?php echo $info['id_condutor']; ?></td>
        <td><?php echo $info['periodo_reservado']; ?></td>
        <td><?php echo $info['secretaria']; ?></td>
        <td><?php echo $info['funcionario']; ?></td>
    </tr>
    <?php endforeach; ?>
</table><br>

<legend>Reservas de Viagens</legend>
<table colspan='3'>
    <tr>
        <th>Codigo do Veiculo</th>
        <th>Data de Saída</th>
        <th>Data de Retorno</th>
        <th>km Inicial</th>
        <th>Km Final</th>
        <th>Secretaría</th>
        <th>Funcionário</th>
        <th>Destino</th>
    </tr>
    <?php foreach($reservas_viagem as $info): ?>
    <tr>
        <td><?php echo $info['codigo_veiculo']; ?></td>
        <td><?php echo $info['data_saida']; ?></td>
        <td><?php echo $info['data_retorno']; ?></td>
        <td><?php echo $info['km_inicial']; ?></td>
        <td><?php echo $info['km_final']; ?></td>
        <td><?php echo $info['secretaria']; ?></td>
        <td><?php echo $info['condutor']; ?></td>
        <td><?php echo $info['destino']; ?></td>
    </tr>
    <?php endforeach; ?>
</table>
