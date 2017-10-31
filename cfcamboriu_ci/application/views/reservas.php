<img id="bandeira" src="<?php echo base_url('/assets/images/bandeira1.png')?>" alt="">
<div id="div_btns">
<?php if($_SESSION['nivel'] >= 3):?>
    <a href="reservas/cad_reserva"><button id="bnt_cadastro"> Cadastrar Reserva</button></a>
    <a href="reservas/cad_retorno"><button id="bnt_cadastro"> Cadastrar Retorno</button></a>
<?php endif;?>
</div>

<legend>Condição dos veiculos</legend>

<!-- recebendo as placas de veiculos que estao cadastrados -->
<form action="" id="pesquisas" method="POST">
    <select name="condicaoVeiculosPlaca" id="Ramo do fornecedor">
        <option value="">Placa do veículo</option>
        <?php foreach($veiculos as $info):?>
            <option value="<?php echo $info["id_veiculo"];?>"><?php echo $info["placa"];?></option>
        <?php endforeach;?>
    </select>
    <a href=""><button>Pesquisar</button> </a>
</form><br>

<table colspan='3'>
    <tr>
        <th>Condicao</th>
        <th>Utima reserva</th>
        <th>Modelo</th>
        <th>Placa do Veiculo</th>
        <th>Responsável</th>
    </tr>
    <?php foreach($condicao as $info): ?>
    <tr>
        <th><?php echo $info["condicao"]; ?></td>
        <th><?php echo date("d/m/Y H:i:s", strtotime($info["data_saida"])); ?></td>
        <td><?php echo $info["modelo"]; ?></td>
        <td><?php echo $info["placa"]; ?></td>
        <td><?php echo $info["funcionario"]; ?></td>
    </tr>
    <?php endforeach; ?>
</table><br>


<legend>Pesquisar reservas por tipo de reservas</legend>

<form action="" id="pesquisas" method="POST">
    <select name="tipo_reserva" id="Ramo do fornecedor">
    <option value="">Tipo de reserva</option>
        <option value="manutenção">Manutenção</option>
        <option value="comum">Comum</option>
        <option value="Viagem">Viagem</option>
    </select>
    <a href=""><button>Pesquisar</button> </a>
</form><br>

<table colspan='3'>
    <tr>
        <!-- <th>id</th> -->
        <th>Placa do Veiculo</th>
        <th>Data de Reserva</th>
        <th>Dados de Retorno</th>
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
        <!-- <td><?php echo $info["id_reserva"]; ?></td> -->
        <td><?php echo $info["placa"]; ?></td>
        <td><?php echo date("d/m/Y H:i:s", strtotime($info["data_saida"])); ?></td>
        <td>
            <!-- SE O CAMPO DATA DE RETORNO ESTIVER VAZIO, ADCIONAMOS UM BOTAO PARA EDITAR E SETAR O RETORNO -->
            <?php if($info["data_retorno"] != null){
                echo date("d/m/Y H:i/s", strtotime($info["data_retorno"]));
            }elseif($info["id_user"] == $_SESSION["id_user"] && $info["data_retorno"] == null) {
                echo "reservado";};?>
        </td>
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

