<?php

class homeController extends Controller{

    public function index() {
        $dados = new UserLogin();

        if(isset($_POST["user_login"])) {
            $dados->confirmUser($_POST["user_login"], $_POST["user_password"]);
        }
        $this->loadView("login");
    }

    public function inicio() {
        // $dados = array();
        // $tabelas = new Tabelas();
        // $dadps["veiculos"] = $tabelas->Insert("tb_veiculos");
        // $this->loadTemplate("cad_veiculos", $dados);]
        // acessando o session logado, sem login o user é redirecionado ao index
        // $this->us->getSession();

        $this->loadTemplate("inicio");
    }

    public function sair() {
        $_SESSION["logado"] = "false";
        header("location: /index.php");
    }
}