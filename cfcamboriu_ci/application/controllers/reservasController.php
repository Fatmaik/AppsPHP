<?php

class reservasController extends Controller{
    protected $us;
    protected $table;

    public function __construct() {
        $this->us = new UserLogin();
        $this->table = new Tabelas();
    }

    public function index() {

        // daddos que seram passados para a view
        $dados = array();

        // acessando o session logado, sem login o user é redirecionado ao index
        $this->us->getSession();

        $dados["veiculos"] = $this->table->Select("veiculos");

        // se tiver pesqiosa de placas especifocas no form de placa, o select pega so as placas
        if(isset($_POST["condicaoVeiculosPlaca"])) {
            $dados["condicao"] = $this->table->condicaoVeiculosPlaca($_POST["condicaoVeiculosPlaca"]);
        }else{
            $dados["condicao"] = $this->table->condicaoVeiculos();
        }

        if(isset($_POST["tipo_reserva"])) {
            $dados["reservas_comum"] = $this->table->joinPlacaReservasCondicao("reservas", "tipo_reserva", $_POST["tipo_reserva"]);
        }else{
            $dados["reservas_comum"] = $this->table->joinPlacaReservas("reservas");
        }

        // $dados["reservas_comum"] = $this->table->joinPlacaReservas("reservas", "tipo_reserva", "viagem");
        $this->loadTemplate("reservas", $dados);
    }

    public function cad_reserva() {
         // acessando o session logado, sem login o user é redirecionado ao index
        $this->us->getSession();

        $dados["condutores"] = $this->table->Select("condutores");
        $dados["veiculos"] = $this->table->Select("veiculos");
        $dados["test"] = $this->table->Select("reservas");

        // mensagem de informacao caso a reserva nao possa ser concluida
        $dados['existente'] = " ";

        if(isset($_POST["id_veiculo"])) {

            // metodo para pesquisar a existencia de reservas do mesmo veiculo em aberto
            $x = $this->table->verReservas($_POST["id_veiculo"], $_POST["data_saida"]);

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
                $this->table->insert("reservas", $dados_insert);
                header("location: /reservas");
            }
        }
        $this->loadTemplate("reservas/cad_reserva", $dados);
    }

    public function cad_retorno() {
        $dados = array();
        $dados["reservas_proprias"] = $this->table->select_reservas_proprias($_SESSION["id_user"]);
        $this->loadTemplate("reservas/cad_retorno", $dados);
    }
}
