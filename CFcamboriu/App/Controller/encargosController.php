<?php

class encargosController extends Controller{
    protected $us;
    protected $table;

    public function __construct() {
        $this->us = new UserLogin();
        $this->table = new Tabelas();
    }

    public function index() {
        // acessando o session logado, sem login o user é redirecionado ao index
        $this->us->getSession();

        $dados["encargos"] = $this->table->Select("tb_multas");

        $this->loadTemplate("encargos", $dados);
    }

    public function cad_multas() {
        // acessando o session logado, sem login o user é redirecionado ao index
        $this->us->getSession();

        $dados["veiculos"] = $this->table->Select("tb_veiculos");
        $dados["reservas"] = $this->table->Select("tb_reservas");

        if(isset($_POST['data'])) {
            $dados_insert = array(
                "data"=>$_POST["data"],
                "placa"=>$_POST["placa"],
                "tb_reserva_id_reserva"=>$_POST["tb_reserva_id_reserva"],
                "valor"=>$_POST["valor"],
                "pdf_multa"=>$_FILES['name'],
                "local"=>$_POST["local"],
                "nivel"=>$_POST["nivel"],
                "infracao"=>$_POST["infracao"]
            );

            $this->table->insert("tb_multas", $dados_insert);

            // armazenar os arquivos no diretorio desejado
            // move_uploaded_file($file['tmp_name'], '/Assets/pdf/'.$file['name']);

            // header("location: /encargos");
        }
        $this->loadTemplate("encargos/cad_multas", $dados);
        // para pegar o arquivo com superglobal
        ## $file = $_FILES['name'];

        // informacoes do arquivo
        ## $file['tmp_name'] // endereço do diretorio onde esta guardado o arquivo no servidor
        ## $file['name'] // este "name" e o nome literal do arquivo que ira ser carregado, NAO EH (name que voce informa no form)

    }

    public function cad_licenciamentos() {
        // acessando o session logado, sem login o user é redirecionado ao index
        $this->us->getSession();

        $dados["veiculos"] = $this->table->Select("tb_veiculos");

        if(isset($_POST['id_veiculo'])) {
            $dados_insert = array(
                "tb_veiculos_id_veiculo"=>$_POST["id_veiculo"],
                "valor_total"=>$_POST["valor_total"],
                "vencimento"=>$_POST["vencimento"],
                "status_pagamento"=>$_POST["status_pagamento"]
            );
            $this->table->insert("tb_licenciamentos", $dados_insert);
            // header("location: /reservas");
        }
        $this->loadTemplate("encargos/cad_licenciamentos", $dados);
    }
}