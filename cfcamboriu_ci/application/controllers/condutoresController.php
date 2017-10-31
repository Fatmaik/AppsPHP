<?php

class condutoresController extends Controller{
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
        $dados["condutores"] = $this->table->Select("condutores");
        $this->loadTemplate("condutores", $dados);
    }

    public function cad_condutores() {
        // acessando o session logado, sem login o user é redirecionado ao index
        $this->us->getSession();

        if(isset($_POST["nome"]))  {
            $dados_insert = array(
                "habilitacao"=>$_POST["habilitacao"],
                "categoria"=>$_POST["categoria"],
                "data_vencimento"=>$_POST["data_vencimento"],
                "nome"=>$_POST["nome"]
            );
            $this->table->insert("condutores", $dados_insert);
            header("location: /condutores");
        }
        $this->loadTemplate("condutores/cad_condutores");
    }
}
