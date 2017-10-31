<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // carreganho o model Tabelas_model e setando um apelido de Tabelas
        $this->load->model('Tabelas_model', 'Tabelas');
        $this->load->model('Gastos_model', 'Gastos');
        $this->load->helper('url');
    }

	public function index() {

        // carregando os dados do formulario de login
        if(isset($_POST["user_login"])) {
            $user = addslashes($_POST["user_login"]);
            $password = addslashes(md5($_POST["user_password"]));

            $usuarios_info = $this->Tabelas->login();

            // com os dados corretos carregados uma seria de $_Session sao configurados
            foreach($usuarios_info as $info) {
                $userLogin = $info["user"];
                $userPassword = $info["password"];
                $_SESSION["usuario"] = $info["user"];
                $_SESSION["nivel"] = $info["nivel"];
                $_SESSION['id_user'] = $info['id_usuario'];

                if($user == $userLogin && $password == $userPassword) {
                    $_SESSION["logado"] = "true";
                    redirect("home/inicio");
                }else{
                    $_SESSION["logado"] = "false";
                }
            };
        };

		$this->load->view('login');
    }

    public function inicio() {
        // se o login ocorrer corretamente o Template receve a views inicial para carregar

        if(isset($_POST['mes'])) {
            // pegando o numero do mes
            $mes = date('m', strtotime($_POST['mes']));
            
            // pesquisas do mes 
            $dados['manutencoes'] = $this->Gastos->manutencoes_mensais($_POST['mes']);
            $dados['licenciamentos'] = $this->Gastos->licenciamentos_mensais($_POST['mes']);
            $dados['abastecimentos'] = $this->Gastos->abastecimentos_mensais($_POST['mes']);
            $dados['multas'] = $this->Gastos->multas_mensais($_POST['mes']);
            // $dados['estacionamentos'] = $this->Gastos->estacionamentos_mensais($_POST['mes']);
            // $dados['lava_rapido'] = $this->Gastos->lava_rapido_mensais($_POST['mes']);
            // $dados['pedagios'] = $this->Gastos->pedagios_mensais($_POST['mes']);
            // $dados['seguros'] = $this->Gastos->seguros_mensais($_POST['mes']);
            // 
            $dados['resultado'] = 'Resultados do mes '.$mes;
        }else{
            // pesquisas do ano
            $dados['manutencoes'] = $this->Gastos->manutencoes_anuais();
            $dados['abastecimentos'] = $this->Gastos->abastecimentos_anuais();
            $dados['multas']= $this->Gastos->multas_anuais();
            // $dados['estacionamentos'] = $this->Gastos->estacionamentos_anuais();
            // $dados['lava_rapido'] = $this->Gastos->lava_rapido_anuais();
            // $dados['pedagios'] = $this->Gastos->pedagios_anuais();
            // $dados['seguros'] = $this->Gastos->seguros_anuais();
            // $dados['licenciamentos'] = $this->Gastos->licenciamentos_anuais();
            $dados['resultado'] = 'Resultados deste ano';
            
        }

        $dados['viewName'] = 'inicio';
        $this->load->view('Template', $dados);
    }

    public function sair() {
        $_SESSION["logado"] = "false";
        redirect("/index.php");
    }
}
// echo "<pre>";
            //     print_r($usuarios_info);
            // echo"</pre>";