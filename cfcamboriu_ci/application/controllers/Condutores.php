<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Condutores extends CI_Controller{

    public function __construct() {
        parent::__construct();
        $this->load->model('Tabelas_model', 'Tabelas');
    }

    public function index() {
        // acessando o session logado, sem login o user é redirecionado ao index
        $this->Tabelas->getSession();
        // daddos que seram passados para a view
        $dados = array();
        $dados["condutores"] = $this->Tabelas->Select("condutores");

        // se for adiocionado a atualizacao da data de vencimento da cnh do condutor, isso altera no DB
        if(isset($_POST['id_condutor'])) {
            $this->Tabelas->update('condutores', 'data_vencimento', date('Y/m/d', strtotime("+5 YEAR")), 'id_condutor', $_POST['id_condutor']);
            redirect('/condutores');
        }
        
        $dados['viewName'] = 'condutores';
        $this->load->view("Template", $dados);
    }

    public function cad_condutores() {
        // acessando o session logado, sem login o user é redirecionado ao index
        $this->Tabelas->getSession();

        if(isset($_POST["nome"]))  {
            $dados_insert = array(
                "habilitacao"=>$_POST["habilitacao"],
                "categoria"=>$_POST["categoria"],
                "data_vencimento"=>$_POST["data_vencimento"],
                "nome"=>$_POST["nome"]
            );
            $this->db->insert("condutores", $dados_insert);
            redirect('/condutores');
        }
        
        $dados['viewName'] = 'condutores/cad_condutores';
        $this->load->view("Template", $dados);
    }
}
