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

        $dados["veiculos"] = $this->table->Select("veiculos");
        // metodo para sincronizar o id do veiculo cadastrado no licenciamento com a sua devida placa
        $dados["licenciamentos"] = $this->table->JoinPlacaLicenciamtos();
        // print_r($dados["licenciamentos"]);
        foreach($dados["licenciamentos"] as $info) {
            if(date("d/m/Y", strtotime($info["vencimento"])) <= date("d/m/Y", strtotime('-1 month'))) {
                $id = $info["id_doc"];
                $this->table->update("licenciamentos", "status_pagamento", "Em atraso", "id_doc", $id);
            };
        }

        if(isset($_POST["pesquisaMultas"])) {
            // metodo que retorna o veiculo especificado na pesquisa
            $dados["multas"] = $this->table->multasUnitarias($_POST["pesquisaMultas"]);
        }else{
            // metodo responsavel por achar o responsavel pelo veiculo no pediodo da multa
            $dados["multas"] = $this->table->JoinPlacaMultas();
        }
        // metodo para retornar a placa do veiculo que esta em manutencao
        $dados["manutencoes"] = $this->table->JoinPlacaManutencoes();

        // metodo para retornar veiculo e fornecedores dos abastecimentos
        $dados["abastecimentos"] = $this->table->JoinPlacaAbastecimentos();

        // echo date("d/m/Y", strtotime('-1 month'));
        $this->loadTemplate("encargos", $dados);
    }

    public function cad_multas() {

        // acessando o session logado, sem login o user é redirecionado ao index
        $this->us->getSession();

        $dados["veiculos"] = $this->table->Select("veiculos");
        $dados["reservas"] = $this->table->Select("reservas");

        if(isset($_POST['data'])) {
            $dados_insert = array(
                "data"=>$_POST["data"],
                "id_veiculo"=>$_POST["id_veiculo"],
                "valor"=>$_POST["valor"],
                // "pdf_multa"=>$_FILES['name'],
                "local"=>$_POST["local"],
                "nivel"=>$_POST["nivel"],
                "infracao"=>$_POST["infracao"]
            );

            $this->table->insert("multas", $dados_insert);
            $responsavel = $this->table->findResponsavelMulta();
            
            foreach($responsavel as $info) {
                // echo "resp ".$info["responsavel_infracao"]. "<br>";
                $this->table->update("multas", "responsavel_infracao", $info["responsavel_infracao"] , "id_multa", $info["id_multa"]);
            };
            header("location: /encargos");

        }
        $this->loadTemplate("encargos/cad_multas", $dados);

    }

    public function cad_licenciamentos() {
        // acessando o session logado, sem login o user é redirecionado ao index
        $this->us->getSession();

        $dados["veiculos"] = $this->table->Select("veiculos");

        if(isset($_POST['id_veiculo'])) {
            $dados_insert = array(
                "id_veiculo"=>$_POST["id_veiculo"],
                "vencimento"=>$_POST["vencimento"],
                "valor_total"=>$_POST["valor_total"],
                "status_pagamento"=>"Em dia",
                "RENAVAN"=>$_POST["RENAVAN"]
            );
            $this->table->insert("licenciamentos", $dados_insert);
            header("location: /encargos");
        }

        $this->loadTemplate("encargos/cad_licenciamentos", $dados);
    }
}

