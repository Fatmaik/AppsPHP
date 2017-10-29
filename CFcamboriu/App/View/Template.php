<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CF.Camboriu</title>
    <link rel="stylesheet" href="/Assets/css/template/estilo.css">
    <script src="/Assets/js/library/jquery.js"></script>
</head>
<body>
    <header>
        <div id="menu">
            <div id="links">
                <a href="/home/inicio">Início</a>
                <a href="/veiculos">Veículos</a>
                <a href="/condutores">Condutores</a>
                <a href="/fornecedores">Fornecedores</a>
                <a href="/reservas">Reservas de Veiculos</a>
                <a href="/encargos">Encargos do Veículo</a>
                <a href="/home/sair">Sair</a>
            </div>
        </div>
    </header>

    <main class="main">
            <?php $this->loadView($viewName, $viewData);?>
        </div> <br>
    </main>

    <footer>
        <p>Todos os direitos reservador Prefeitura de Camboriú</p>
    </footer>
    <script src="/Assets/js/main.js"></script>
</body>
</html>