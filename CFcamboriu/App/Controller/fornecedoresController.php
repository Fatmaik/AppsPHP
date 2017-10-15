<?php

class fornecedoresController extends Controller{
    protected $us;
    protected $table;
    
    public function __construct() {
        $this->us = new UserLogin();
        $this->table = new Tabelas();
    }

    public function index() {
        // acessando o session logado, sem login o user é redirecionado ao index
        $this->us->getSession();
        // daddos que seram passados para a view
        $dados = array();

        $dados["fornecedores"] = $this->table->Select("tb_fornecedores");
        $this->loadTemplate("fornecedores", $dados);
    }

    public function cad_fornecedores() {
        // acessando o session logado, sem login o user é redirecionado ao index
        $this->us->getSession();

        if(isset($_POST["nome"]))  {
            $dados_insert = array(
                "nome"=>$_POST['nome'],
                "endereco"=>$_POST['endereco'],
                "codigo_fornecedor"=>$_POST['codigo_fornecedor'],
                "cnpj"=>$_POST['cnpj'],
                "telefone"=>$_POST['telefone'],
                "banco"=>$_POST['banco'],
                "agencia"=>$_POST['agencia'],
                "conta"=>$_POST['conta']
            );
            $this->table->insert("tb_fornecedores", $dados_insert);
            header("location: /fornecedores");
        }
        $this->loadTemplate("fornecedores/cad_fornecedores");
    }
}
