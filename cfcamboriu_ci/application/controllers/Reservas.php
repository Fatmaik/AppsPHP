<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reservas extends CI_Controller{

    public function __construct() {
        parent::__construct();
        $this->load->model('Tabelas_model', 'Tabelas');
    }

    public function index() {

        // daddos que seram passados para a view
        $dados = array();

        // acessando o session logado, sem login o Tabelaser é redirecionado ao index
        $this->Tabelas->getSession();

        $dados["veiculos"] = $this->Tabelas->Select("veiculos");

        // se tiver pesqiosa de placas especifocas no form de placa, o select pega so as placas
        if(isset($_POST["condicaoVeiculosPlaca"])) {
            $dados["condicao"] = $this->Tabelas->condicaoVeiculosPlaca($_POST["condicaoVeiculosPlaca"]);
        }else{
            $dados["condicao"] = $this->Tabelas->condicaoVeiculos();
        }

        // metodo de busca por tipo de reserva ex:viagem
        if(isset($_POST["tipo_reserva"])) {
            $dados["reservas_comum"] = $this->Tabelas->joinPlacaReservasCondicao("reservas", "tipo_reserva", $_POST["tipo_reserva"]);
        }else{
            $dados["reservas_comum"] = $this->Tabelas->joinPlacaReservas("reservas");
        }

        $dados['viewName'] = 'reservas';
        $this->load->view('Template', $dados);
    }

    public function cad_reserva() {
         // acessando o session logado, sem login o Tabelaser é redirecionado ao index
        $this->Tabelas->getSession();

        $dados["condutores"] = $this->Tabelas->Select("condutores");
        $dados["veiculos"] = $this->Tabelas->Select("veiculos");
        $dados["test"] = $this->Tabelas->Select("reservas");

        // mensagem de informacao caso a reserva nao possa ser concluida
        $dados['existente'] = " ";

        if(isset($_POST["id_veiculo"])) {

            // metodo para pesquisar a existencia de reservas do mesmo veiculo em aberto
            $x = $this->Tabelas->verReservas($_POST["id_veiculo"], $_POST["data_saida"]);

            // dados passados para o insert da tabela aabastecimentos
            if($_POST["tipo_reserva"] == "Manutenção") {
                $dados_insert = array(
                    "id_veiculo"=>$_POST["id_veiculo"],
                    "km_inicial"=>$_POST["km_inicial"],
                    "periodo_reservado"=>$_POST["periodo_reservado"],
                    "secretaria"=> $_POST["secretaria"],
                    "funcionario"=>$_POST["funcionario"],
                    "tipo_reserva"=>$_POST["tipo_reserva"],
                    "data_saida"=>$_POST["data_saida"],
                    "condicao"=>"manutencao",
                    "id_condutor"=>$_POST["id_condutor"],
                    "destino"=>$_POST["destino"],
                    "id_user"=>$_SESSION['id_user']
                );
            }else{
                $dados_insert = array(
                    "id_veiculo"=>$_POST["id_veiculo"],
                    "km_inicial"=>$_POST["km_inicial"],
                    "periodo_reservado"=>$_POST["periodo_reservado"],
                    "secretaria"=> $_POST["secretaria"],
                    "funcionario"=>$_POST["funcionario"],
                    "tipo_reserva"=>$_POST["tipo_reserva"],
                    "data_saida"=>$_POST["data_saida"],
                    "condicao"=>"reservado",
                    "id_condutor"=>$_POST["id_condutor"],
                    "destino"=>$_POST["destino"],
                    "id_user"=>$_SESSION['id_user']
                );
            }

            // se o len for > 20, significa que o veiculo ja esta com reserva em andamento
            if(strlen($x) > 20) {
                $dados["existente"] = $x;
            }else{
                $dados["existente"] = $x;
                $this->db->insert("reservas", $dados_insert);
                redirect('/reservas');
            }
        }
        $dados['viewName'] = 'reservas/cad_reserva';
        $this->load->view('Template', $dados);
    }

    public function cad_retorno() {
        $dados = array();
        $dados["reservas_proprias"] = $this->Tabelas->select_reservas_proprias($_SESSION["id_user"]);
       
        // chamando o metodo de troca de dados de reservas, e setanco data de entrega
        if(isset($_POST["id_retorno"])) {
            $this->Tabelas->update_retorno($_POST["id_retorno"]); 
            redirect('/reservas/cad_retorno');  
        };

        $dados['viewName'] = 'reservas/cad_retorno';
        $this->load->view('Template', $dados);
    }
}
