<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fornecedores extends CI_Controller{

    public function __construct() {
        parent::__construct();
        $this->load->model('Tabelas_model', 'Tabelas');
    }

    public function index() {
        // acessando o session logado, sem login o Tabelaser é redirecionado ao index
        $this->Tabelas->getSession();
        // daddos que seram passados para a view
        $dados = array();

        $dados["ramos"] = $this->Tabelas->Select("fornecedores");

        if(isset($_POST["pesquisaRamo"])) {
            $dados["fornecedores"] = $this->Tabelas->filtro("fornecedores", "ramo", $_POST["pesquisaRamo"]);   
        }else{
            $dados["fornecedores"] = $this->Tabelas->Select("fornecedores");
        }
        $dados['viewName'] = 'fornecedores';
        $this->load->view("Template", $dados);
    }

    public function cad_fornecedores() {
        // acessando o session logado, sem login o Tabelaser é redirecionado ao index
        $this->Tabelas->getSession();

        if(isset($_POST["nome"]))  {
            $dados_insert = array(
                "nome"=>$_POST['nome'],
                "endereco"=>$_POST['endereco'],
                "codigo_fornecedor"=>$_POST['codigo_fornecedor'],
                "cnpj"=>$_POST['cnpj'],
                "telefone"=>$_POST['telefone'],
                "banco"=>$_POST['banco'],
                "agencia"=>$_POST['agencia'],
                "conta"=>$_POST['conta'],
                "ramo"=>$_POST["ramo"]
            );
            $this->Tabelas->insert("fornecedores", $dados_insert);
            redirect('/fornecedores');
        }
        $dados['viewName'] = 'fornecedores/cad_fornecedores';
        $this->load->view("Template", $dados);
    }
}
