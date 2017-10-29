<img id="bandeira"src="/Assets/images/bandeira1.png" alt="">
<div id="div_btns">
    <a href="/reservas"><button id="bnt_cadastro">Voltar</button></a>
</div>

<legend id="fieldset_cadastro">Suas reservas cadastradas</legend><br>
<table colspan='3'>
<tr>
    <th>id</th>
    <th>Placa do Veiculo</th>
    <th>Condicao</th>
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
<?php foreach($reservas_proprias as $info): ?>
<tr>
    <td><?php echo $info["id_reserva"]; ?></td>
    <td><?php echo $info["placa"]; ?></td>
    <th><?php echo $info["condicao"]; ?></td>
    <td><?php echo date("d/m/Y H:i:s", strtotime($info["data_saida"])); ?></td>
    <td>
        <!-- SE O CAMPO DATA DE RETORNO ESTIVER VAZIO, ADCIONAMOS UM BOTAO PARA EDITAR E SETAR O RETORNO -->
        <?php if($info["data_retorno"] != null){
            echo date("d/m/Y H:i/s", strtotime($info["data_retorno"])); 
        }elseif($info["id_user"] == $_SESSION["id_user"] && $info["data_retorno"] == null) { 
            echo"<form action='' method='POST' id='retornar'>
                    <button value=".$info["id_reserva"]." name='id_retorno'>Retornar</button>
                </form>"
        ;};?>
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
$tabela = new Tabelas();
// chamando o metodo de troca de dados de reservas, e setanco data de entrega
if(isset($_POST["id_retorno"])) {
    $tabela->update_retorno($_POST["id_retorno"]); 
    header("location: /reservas/cad_retorno");  
};
