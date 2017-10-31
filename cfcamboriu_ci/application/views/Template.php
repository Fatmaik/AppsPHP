<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CF.Camboriu</title>
    <link rel="stylesheet" href="<?php echo base_url('/assets/css/template/estilo.css')?>">
    <script src="/Assets/js/library/jquery.js"></script>
</head>
<body>
    <header>
        <div id="menu">
            <div id="links">
                <a href="<?php echo base_url('home/inicio')?>">Início</a>
                <a href="<?php echo base_url('/veiculos')?>">Veículos</a>
                <a href="<?php echo base_url('/condutores')?>">Condutores</a>
                <a href="<?php echo base_url('/fornecedores')?>">Fornecedores</a>
                <a href="<?php echo base_url('/reservas')?>">Reservas de Veiculos</a>
                <a href="<?php echo base_url('/encargos')?>">Encargos do Veículo</a>
                <a href="<?php echo base_url('/home/sair')?>">Sair</a>
            </div>
        </div>
    </header>

    <main class="main">
        <?php $this->load->view($viewName);?>
        </div> <br>
    </main>

    <footer>
        <p>Todos os direitos reservador Prefeitura de Camboriú</p>
    </footer>
    <script src="/Assets/js/main.js"></script>
</body>
</html>