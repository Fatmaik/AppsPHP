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

        $dados["reservas_comum"] = $this->table->joinPlaca("tb_reservas");
        $this->loadTemplate("reservas", $dados);
    }

    public function cad_reserva() {
         // acessando o session logado, sem login o user é redirecionado ao index
        $this->us->getSession();

        $dados["condutores"] = $this->table->Select("tb_condutores");
        $dados["veiculos"] = $this->table->Select("tb_veiculos");

        if(isset($_POST["tb_veiculos_id_veiculo"])) {
            // dados passados para o insert da tabela aabastecimentos
            $dados_insert = array(
                "tb_veiculos_id_veiculo"=>$_POST["tb_veiculos_id_veiculo"],
                "km_inicial"=>$_POST["km_inicial"],
                "periodo_reservado"=>$_POST["periodo_reservado"],
                "secretaria"=> $_POST["secretaria"],
                "funcionario"=>$_POST["funcionario"],
                "tipo_reserva"=>$_POST["tipo_reserva"],
                "data_saida"=>$_POST["data_saida"],
                "tb_condutores_id_condutor"=>$_POST["tb_condutores_id_condutor"]
            );
            $this->table->insert("tb_reservas", $dados_insert);
            header("location: /reservas");
        }
        $this->loadTemplate("reservas/cad_reserva", $dados);
    }
}
