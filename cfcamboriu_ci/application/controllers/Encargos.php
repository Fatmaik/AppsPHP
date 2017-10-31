<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Encargos extends CI_Controller{

    public function __construct() {
        parent::__construct();
        $this->load->model('Tabelas_model', 'Tabelas');
    }

    public function index() {

        // acessando o session logado, sem login o user é redirecionado ao index
        $this->Tabelas->getSession();

        $dados["veiculos"] = $this->Tabelas->Select("veiculos");

        // metodo para sincronizar o id do veiculo cadastrado no licenciamento com a sua devida placa
        $dados["licenciamentos"] = $this->Tabelas->JoinPlacaLicenciamtos();
        
        // se a data de vencimento for nos proximas 30 dias o status muda para em atraso
        foreach($dados["licenciamentos"] as $info) {
            $venci = $info["vencimento"];
            $agora = date('Y-m-d');
            $t_v = strtotime($venci);
            $t_a = strtotime($agora);
            $diferenca = $t_v - $t_a;
            $data = (int)floor($diferenca / (60 * 60 * 24) ); 
            if($data <= 30) {
                $id = $info["id_doc"];
                $this->Tabelas->update("licenciamentos", "status_pagamento", "Em atraso", "id_doc", $id);
            };
        }

        if(isset($_POST['id_pago'])) {
            $this->Tabelas->update('licenciamentos', 'vencimento', date('Y/m/d', strtotime("+1 YEAR")), 'id_doc', $_POST['id_pago']);
            $this->Tabelas->update('licenciamentos', 'status_pagamento', "Em dia", 'id_doc', $_POST['id_pago']);
            redirect('/encargos');
        }

        if(isset($_POST["pesquisaMultas"])) {
            // metodo que retorna o veiculo especificado na pesquisa
            $dados["multas"] = $this->Tabelas->multasUnitarias($_POST["pesquisaMultas"]);
        }else{
            // metodo responsavel por achar o responsavel pelo veiculo no pediodo da multa
            $dados["multas"] = $this->Tabelas->JoinPlacaMultas();
        }
        // metodo para retornar a placa do veiculo que esta em manutencao
        $dados["manutencoes"] = $this->Tabelas->JoinPlacaManutencoes();

        // metodo para retornar veiculo e fornecedores dos abastecimentos
        $dados["abastecimentos"] = $this->Tabelas->JoinPlacaAbastecimentos();

        $dados['viewName'] = 'encargos';
        $this->load->view("Template", $dados);
    }

    public function cad_multas() {

        // acessando o session logado, sem login o user é redirecionado ao index
        $this->Tabelas->getSession();

        $dados["veiculos"] = $this->Tabelas->Select("veiculos");
        $dados["reservas"] = $this->Tabelas->Select("reservas");

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

            $this->db->insert("multas", $dados_insert);
            $responsavel = $this->Tabelas->findResponsavelMulta();
            
            foreach($responsavel as $info) {
                $this->Tabelas->update("multas", "responsavel_infracao", $info["responsavel_infracao"] , "id_multa", $info["id_multa"]);
            };
            redirect('/encargos');

        }
        $dados['viewName'] = 'encargos/cad_multas';
        $this->load->view("Template", $dados);
        

    }

    public function cad_licenciamentos() {
        // acessando o session logado, sem login o user é redirecionado ao index
        $this->Tabelas->getSession();

        $dados["veiculos"] = $this->Tabelas->Select("veiculos");

        if(isset($_POST['id_veiculo'])) {
            $dados_insert = array(
                "id_veiculo"=>$_POST["id_veiculo"],
                "vencimento"=>$_POST["vencimento"],
                "valor_total"=>$_POST["valor_total"],
                "status_pagamento"=>"Em dia",
                "RENAVAN"=>$_POST["RENAVAN"]
            );
            $this->db->insert("licenciamentos", $dados_insert);
            redirect('/encargos');
        }

        $dados['viewName'] = 'encargos/cad_licenciamentos';
        $this->load->view("Template", $dados);
    }
}

