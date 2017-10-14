<?php

class encargosController extends Controller{
    protected $us;
    protected $tabelas;

    public function __construct() {
        $this->us = new UserLogin();
        $this->tabelas = new Tabelas();
    }

    public function index() {
        $this->loadTemplate("encargos");
    }

    public function cad_multas() {
        $this->loadTemplate("encargos/cad_multas");
    }

    public function cad_licenciamentos() {
        $this->loadTemplate("encargos/cad_licencimento");
    }
}