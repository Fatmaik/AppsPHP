<img id="bandeira" src="/Assets/images/bandeira1.png" alt="">
<div id="div_btns">
<?php if($_SESSION['nivel'] == 5):?>
    <a href="veiculos/cad_veiculos"><button id="bnt_cadastro"> Cadastrar Veículos</button></a>
    <a href="veiculos/cad_manutencoes"><button id="bnt_cadastro"> Cadastrar Manutenções</button></a>
    <a href="veiculos/cad_abastecimentos"><button id="bnt_cadastro"> Cadastrar Abastecimento</button></a>
<?php endif;?>
</div><br><br>
<legend>Veículos</legend>
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
</table><br><br>


<legend>Pesquisar manutenções por placa</legend>

<form action="" id="pesquisas" method="POST">
    <select name="pesquisaManutencoes" id="Ramo do fornecedor">
        <option value="">Placa do veículo</option>
        <?php foreach($veiculos as $info):?>
            <option value="<?php echo $info["id_veiculo"];?>"><?php echo $info["placa"];?></option>
        <?php endforeach;?>
    </select>
    <a href=""><button>Pesquisar</button> </a>
</form><br>

<legend>Manutenções</legend><br>
<table colspan='3'>
    <tr>
        <th>Veículo</th>
        <th>Fornecedor</th>
        <th>Odômetro</th>
        <th>Data de Entrada</th>
        <th>Data de Saída</th>
        <th>Valor</th>
        <th>Descrição</th>
        <th>Observações</th>
    </tr>
    <?php foreach($manutencoes as $info): ?>
    <tr>
        <td><?php echo $info['placa']; ?></td>
        <td><?php echo $info['nome']; ?></td>
        <td><?php echo $info['odometro_manutencao']; ?></td>
        <td><?php echo date('d/m/Y H:i:s', strtotime($info['data_entrada'])); ?></td>
        <td><?php echo date('d/m/Y H:i:s', strtotime($info['data_saida'])); ?></td>
        <td>R$ <?php echo $info['valor_gasto']; ?></td>
        <td><?php echo $info['descricao_servico']; ?></td>
        <td><?php echo $info['observacoes']; ?></td>
    </tr>
    <?php endforeach; ?>
</table><br><br>

<legend>Pesquisar Abastecimentos por placa</legend>

<form action="" id="pesquisas" method="POST">
    <select name="pesquisaAbastecimentos" id="Ramo do fornecedor">
        <option value="">Todos os veiculos</option>
        <?php foreach($veiculos as $info):?>
            <option value="<?php echo $info["id_veiculo"];?>"><?php echo $info["placa"];?></option>
        <?php endforeach;?>
    </select>
    <a href=""><button>Pesquisar</button> </a>
</form><br>

<legend>Abastecimentos</legend><br>
<table colspan='3'>
    <tr>
        <th>Veículo</th>
        <th>Fornecedor</th>
        <th>Data de Abastecimento</th>
        <th>Tipo do combustivel</th>
        <th>Litros Abastecidos</th>
        <th>Valor do Litro</th>
        <th>Valor Total</th>
        <th>Odômetro</th>
        <th>Tanque Cheio</th>
    </tr>
    <?php foreach($abastecimentos as $info): ?>
    <tr>
        <td><?php echo $info['placa']; ?></td>
        <td><?php echo $info['nome']; ?></td>
        <td><?php echo date('d/m/Y H:i:s', strtotime($info['data_abastecimento'])); ?></td>
        <td><?php echo $info['tipo_combustivel']; ?></td>
        <td><?php echo $info['litros_abastecidos']; ?></td>
        <td>R$ <?php echo $info['valor_litro']; ?></td>
        <td>R$ <?php echo $info['valor_total']; ?></td>
        <td><?php echo $info['odometro']; ?></td>
        <td><?php echo $info['tanque_cheio']; ?></td>
    </tr>
    <?php endforeach; ?>
</table><br>
