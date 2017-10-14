<?php

class veiculosController extends Controller{
    // us esta recevendo no construtor uma nova instancia do model UserLogin
    protected $us;
    // table receve instancia do model Tabelas
    protected $table;

    public function __construct() {
        $this->us = new UserLogin();
        $this->table = new Tabelas();
    }

    public function index() {
        // daddos que seram passados para a view
        $dados = array();

        // metodo para confirmar se o usuario esta logado
        $this->us->getSession();

        $dados["veiculos"] = $this->table->Select("tb_veiculos");
        $this->loadTemplate("veiculos", $dados);
    }

    public function cad_veiculos() {
        // acessando o session logado, sem login o user é redirecionado ao index
        $this->us->getSession();

        if(isset($_POST['placa'])) {
            $dados_insert = array("marca"=>$_POST["marca"], "modelo"=>$_POST["modelo"], "ano"=>$_POST["ano"], "chassi"=>$_POST["chassi"], "placa"=>$_POST["placa"]);
            $this->table->insert("tb_veiculos", $dados_insert);
            header("location: /veiculos");
        }
        $this->loadTemplate("veiculos/cad_veiculos");
    }

    public function cad_abastecimento() {
        // acessando o session logado, sem login o user é redirecionado ao index
        $this->us->getSession();

        $dados["fornecedor"] = $this->table->Select("tb_fornecedores");
        $dados['veiculos'] = $this->table->Select("tb_veiculos");

        if(isset($_POST["id_veiculo"])) {
            // dados passados para o insert da tabela aabastecimentos
            $dados_insert = array(
                "tb_veiculos_id_veiculo"=>$_POST["id_veiculo"],
                "data_abastecimento"=>$_POST["data_abastecimento"],
                "tipo_combustivel"=>$_POST["tipo_combustivel"],
                "valor_total"=> ($_POST["valor_litro"] * $_POST["litros_abastecidos"]),
                "litros_abastecidos"=>$_POST["litros_abastecidos"],
                "valor_litro"=>$_POST["valor_litro"],
                "kilometragem"=>$_POST["kilometragem"],
                "tb_fornecedor_id_fornecedor"=>$_POST["tb_fornecedor_id_fornecedor"]
            );
            $this->table->insert("tb_abastecimentos", $dados_insert);
            header("location: /veiculos");
        }
        $this->loadTemplate("veiculos/cad_abastecimento", $dados);
    }

    public function cad_manutencao() {
        // acessando o session logado, sem login o user é redirecionado ao index
        $this->us->getSession();

        $dados["fornecedor"] = $this->table->Select("tb_fornecedores");
        $dados['veiculos'] = $this->table->Select("tb_veiculos");

        if(isset($_POST["id_veiculo"])) {
            // dados passados para o insert da tabela aabastecimentos
            $dados_insert = array(
                "tb_veiculos_id_veiculo"=>$_POST["id_veiculo"],
                "data_entrada"=>$_POST["data_entrada"],
                "data_saida"=>$_POST["data_saida"],
                "valor_gasto"=> $_POST["valor_gasto"],
                "descricao_servico"=>$_POST["descricao_servico"],
                "observacoes"=>$_POST["observacoes"],
                "tb_fornecedores_id_fornecedor"=>$_POST["tb_fornecedor_id_fornecedor"]
            );
            $this->table->insert("tb_manutencoes", $dados_insert);
            // header("location: /veiculos");
        }
        $this->loadTemplate("veiculos/cad_manutencao", $dados);
    }
}