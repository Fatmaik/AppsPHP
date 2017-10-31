<img id="bandeira" src="<?php echo base_url('/assets/images/bandeira1.png')?>" alt="">
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
    <?php 
         $venci = date('Y-m-d', strtotime($info["data_vencimento"]));
         $agora = date('Y-m-d');
         $t_v = strtotime($venci);
         $t_a = strtotime($agora);
         $diferenca = $t_v - $t_a;
         $data = (int)floor($diferenca / (60 * 60 * 24) );  
    ?>
    <tr>
        <td><?php echo $info['nome']; ?></td>
        <td><?php echo $info['habilitacao']; ?></td>
        <td><?php echo $info['categoria']; ?></td>
        <td><?php 
            if($data <= 30) {
                echo "<span id='span'>". date('d/m/Y', strtotime($info['data_vencimento']));
            }else{
                echo date('d/m/Y', strtotime($info['data_vencimento']));
            }; ?>
        </td>
        <td><?php 
            if($_SESSION['nivel'] == 5 && $data <= 30):
                echo"<form action='' method='POST' id='retornar'>
                <button value=".$info["id_condutor"]." name='id_condutor'>Atualizar</button>
                </form>";
            endif
            ?>
        </td> 
    </tr>
    
    <?php endforeach;?>
</table>
<?php
// echo "<pre>";
// var_dump($condutores);
// echo "</pre>";
