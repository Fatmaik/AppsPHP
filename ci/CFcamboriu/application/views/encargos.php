<img id="bandeira" src="/Assets/images/bandeira1.png" alt="">
<div id="div_btns">
<?php if($_SESSION['nivel'] == 5):?>
    <a href="encargos/cad_multas"><button id="bnt_cadastro"> Cadastrar Multas</button></a>
    <a href="encargos/cad_licenciamentos"><button id="bnt_cadastro"> Cadastrar Licenciamento</button></a>
<?php endif;?>
</div><br><br>

<legend>Pesquisar multas pro placas</legend>

<form action="" id="pesquisas" method="POST">
    <select name="pesquisaMultas" id="Ramo do fornecedor">
        <?php foreach($veiculos as $info):?>
            <option value="<?php echo $info["id_veiculo"];?>"><?php echo $info["placa"];?></option>
        <?php endforeach;?>
    </select>
    <a href=""><button>Pesquisar</button> </a>
</form><br>

<legend>Multas</legend><br>
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
    <?php foreach($multas as $info): ?>
    <tr>
        <td><?php echo date("d/m/Y H:i:s", strtotime($info['data'])); ?></td>
        <td><?php echo $info['placa']; ?></td>
        <td>R$ <?php echo $info['valor']; ?></td>
        <td><?php echo $info['infracao']; ?></td>
        <td><?php echo $info['nivel']; ?></td>
        <td><?php echo $info['local']; ?></td>
        <td><?php echo $info['responsavel_infracao']; ?></td>
        <td><?php echo $info['pdf_multa']; ?></td>
    </tr>
    <?php endforeach; ?>
</table><br>

<legend>Licenciamentos</legend><br>
<table colspan='3'>
    <tr>
        <th>Veículo</th>
        <th>RENAVAN</th>
        <th>Data de Vencimento</th>
        <th>Valor</th>
        <th>Status do Pagamento</th>
    </tr>
    <?php foreach($licenciamentos as $info): ?>
    <tr>
        <td><?php echo $info['placa']; ?></td>
        <td><?php echo $info['renavan']; ?></td>
        <td><?php 
            if(date("d/m/Y", strtotime($info["vencimento"])) <= date("d/m/Y", strtotime('-1 month'))) {
                echo "<span id='span'>". date("d/m/Y", strtotime($info["vencimento"]))."</span>"; 
            }else{
                echo  date("d/m/Y", strtotime($info['vencimento']));
            }?>
        </td>       
        <td>R$ <?php echo $info['valor_total']; ?></td>
        <td><?php 
            if(date("d/m/Y", strtotime($info["vencimento"])) <= date("d/m/Y", strtotime('-1 month'))) {
                    echo "<span id='span'>".$info['status_pagamento']."</span>"; 
            }else{
                    echo  $info['status_pagamento'];
            }?>
        </td>
        <!-- <td><?php echo $info['status_pagamento']; ?></td> -->
    </tr>
    <?php endforeach; ?>
</table><br>

