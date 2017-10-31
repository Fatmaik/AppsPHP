<img id="bandeira" src="<?php echo base_url('/assets/images/bandeira1.png')?>" alt="">
<div id="div_btns">
<?php if($_SESSION['nivel'] == 5):?>
    <a href="<?php echo base_url('veiculos/cad_veiculos')?>"><button id="bnt_cadastro"> Cadastrar Veículos</button></a>
    <a href="veiculos/cad_manutencoes"><button id="bnt_cadastro"> Cadastrar Manutenções</button></a>
    <a href="veiculos/cad_abastecimentos"><button id="bnt_cadastro"> Cadastrar Abastecimento</button></a>
<?php endif;?>
</div><br><br>
<legend>Resumo Geral de Gastos </legend>
<form action="" id="pesquisas" method="POST">
    <input type="date" name="mes">
<a href=""><button>Pesquisar</button> </a>
</form><br>

<legend><?php echo $resultado ?></legend><br>
<table>
    <tr>
        <th>Manutenções</th>
        <th>Abastecimento</th>
        <th>Multas</th>
        <th>Licenciamentos</th>
        <th>Estacionamento</th>
        <th>Lava Rapido</th>
        <th>Pedágio</th>
        <th>Seguro</th>
    </tr>
    <tr>
        <td>R$ <?php foreach($manutencoes as $info){echo $info['Total'];}; ?></td>
        <td>R$ <?php foreach($abastecimentos as $info){echo $info['Total'];}; ?></td>
        <td>R$ <?php foreach($multas as $info){echo $info['Total'];}; ?></td>
        <td>R$ <?php foreach($licenciamentos as $info){echo $info['Total'];}; ?></td>
        <td>R$ <?php foreach($estacionamentos as $info){echo $info['Total'];}; ?></td>
        <td>R$ <?php foreach($lava_rapido as $info){echo $info['Total'];}; ?></td>
        <td>R$ <?php foreach($pedagio as $info){echo $info['Total'];}; ?></td>
        <td>R$ <?php foreach($seguro as $info){echo $info['Total'];}; ?></td> 
    </tr>
</table>

<?php 
// var_dump($manutencoes);