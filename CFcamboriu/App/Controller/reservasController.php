<?php

class reservasController extends Controller{
    protected $us;
    protected $tabelas;
    
    public function __construct() {
        $this->us = new UserLogin();
        $this->tabelas = new Tabelas();
    }

    public function index() {
        // daddos que seram passados para a view
        $dados = array();

        $dados["reservas_comum"] = $this->tabelas->Select("tb_reserva");
        // $dados["reservas_viagem"] = $this->tabelas->Select("tb_viagens");
        $this->loadTemplate("reservas", $dados);
    }

    public function cad_reserva_comum() {
        $this->loadTemplate("reservas/cad_reserva_comum");
    }
    
    public function cad_reserva_viagem() {
        $this->loadTemplate("reservas/cad_reserva_viagem");
    }
}
