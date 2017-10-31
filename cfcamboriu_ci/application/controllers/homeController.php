<?php

class homeController extends Controller{
    // us esta recevendo no construtor uma nova instancia do model UserLogin
    protected $us;
    // table receve instancia do model Tabelas
    protected $table;

    public function __construct() {
        $this->us = new UserLogin();
        $this->table = new Tabelas();
    }

    public function index() {
        if(isset($_POST["user_login"])) {
            $user = addslashes($_POST["user_login"]);
            $password = addslashes(md5($_POST["user_password"]));

            $usuarios_info = $this->table->login($user, $password);
            foreach($usuarios_info as $info) {
                $userLogin = $info["user"];
                $userPassword = $info["password"];
                $_SESSION["usuario"] = $info["user"];
                $_SESSION["nivel"] = $info["nivel"];
                $_SESSION['id_user'] = $info['id_usuario'];

                if($user == $userLogin && $password == $userPassword) {
                    $_SESSION["logado"] = "true";
                    header("location: /home/inicio");
                }else{
                    $_SESSION["logado"] = "false";
                }
            };
        };
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