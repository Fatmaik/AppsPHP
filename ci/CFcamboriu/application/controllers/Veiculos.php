<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Veiculos extends CI_Controller{
    // us esta recevendo no construtor uma nova instancia do model UserLogin
    protected $us;
    // Tabelas receve instancia do model Tabelas

    public function __construct() {
        parent::__construct();
        $this->load->model('Tabelas_model', 'Tabelas');
    }

    public function index() {
        // daddos que seram passados para a view
        $dados = array();

        // metodo para confirmar se o usuario esta logado
        $this->Tabelas->getSession();
        $dados['viewName'] = 'veiculos';
        $dados["veiculos"] = $this->Tabelas->Select("veiculos");

        if(isset($_POST["pesquisaManutencoes"])) {
            // metodo que retorna o veiculo especificado na pesquisa
            $dados["manutencoes"] = $this->Tabelas>manutencoesUnitarias($_POST["pesquisaManutencoes"]);
        }else{
            // metodo para retornar a placa de todos os  veiculo que estam em manutencao
            $dados["manutencoes"] = $this->Tabelas->JoinPlacaManutencoes();
        }

        if(isset($_POST["pesquisaAbastecimentos"])) {
            // metodo que retorna o veiculo especificado na pesquisa
            $dados["abastecimentos"] = $this->Tabelas->abastecimentosUnitarias($_POST["pesquisaAbastecimentos"]);
        }else{
            // metodo para retornar veiculo e fornecedores dos abastecimentos
            $dados["abastecimentos"] = $this->Tabelas->JoinPlacaAbastecimentos();
        }
        $this->load->view("Template", $dados);
    }

    // public function cad_veiculos() {
    //     // acessando o session logado, sem login o user é redirecionado ao index
    //     $this->us->getSession();

    //     if(isset($_POST['placa'])) {
    //         $dados_insert = array("marca"=>$_POST["marca"], "modelo"=>$_POST["modelo"], "ano"=>$_POST["ano"], "chassi"=>$_POST["chassi"], "placa"=>$_POST["placa"]);
    //         $this->Tabelas->insert("veiculos", $dados_insert);
    //         header("location: /veiculos");
    //     }
    //     $this->loadTemplate("veiculos/cad_veiculos");
    // }

    // public function cad_abastecimentos() {
    //     // acessando o session logado, sem login o user é redirecionado ao index
    //     $this->us->getSession();

    //     // $dados["fornecedores"] = $this->Tabelas->Select("fornecedores");
    //     $dados["fornecedores"] = $this->Tabelas->filtro("fornecedores", "ramo", "posto");
    //     $dados["veiculos"] = $this->Tabelas->Select("veiculos");

    //     if(isset($_POST["id_veiculo"])) {
    //         // dados passados para o insert da tabela aabastecimentos
    //         $dados_insert = array(
    //             "id_veiculo"=>$_POST["id_veiculo"],
    //             "data_abastecimento"=>$_POST["data_abastecimento"],
    //             "tipo_combustivel"=>$_POST["tipo_combustivel"],
    //             "valor_total"=> ($_POST["valor_litro"] * $_POST["litros_abastecidos"]),
    //             "litros_abastecidos"=>$_POST["litros_abastecidos"],
    //             "valor_litro"=>$_POST["valor_litro"],
    //             "odometro"=>$_POST["odometro"],
    //             "id_fornecedor"=>$_POST["id_fornecedor"],
    //             "tanque_cheio"=>$_POST["tanque_cheio"]
    //         );
    //         $this->Tabelas->insert("abastecimentos", $dados_insert);
    //         header("location: /veiculos");
    //     }
    //     $this->loadTemplate("veiculos/cad_abastecimentos", $dados);
    // }

    // public function cad_manutencoes() {
    //     $this->us->getSession();

    //     $dados["veiculos"] = $this->Tabelas->Select("veiculos");
    //     $dados["fornecedores"] = $this->Tabelas->filtro("fornecedores", "ramo", "mecanica");

    //     if(isset($_POST["id_veiculo"])) {
    //         $dados_insert = array(
    //             'id_veiculo'=>$_POST['id_veiculo'],
    //             'id_fornecedor'=>$_POST['id_fornecedor'],
    //             'data_entrada'=>$_POST['data_entrada'],
    //             'data_saida'=>$_POST['data_saida'],
    //             'valor_gasto'=>$_POST['valor_gasto'],
    //             'descricao_servico'=>$_POST['descricao_servico'],
    //             'observacoes'=>$_POST['observacoes'],
    //             "odometro_manutencao"=>$_POST["odometro_manutencao"]
    //         );
    //         $this->Tabelas->insert("manutencoes", $dados_insert);
    //         header("location: /veiculos");
    //     }

    //     $this->loadTemplate("veiculos/cad_manutencoes", $dados);
    // }

    
}