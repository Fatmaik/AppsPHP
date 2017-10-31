<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gastos_model extends CI_Model{

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // resultado gerado caso o usuario pesquise por mes
    public function manutencoes_mensais($mes) {
        $query = $this->db->query("SELECT sum(valor_gasto) as Total FROM manutencoes
            where MONTH(data_entrada) =  MONTH('$mes');"
        );
        return $query->result_array();
    }

    // resultado gerado pelo ano
    public function manutencoes_anuais() {
        $query = $this->db->query("SELECT sum(valor_gasto) as Total FROM manutencoes 
            WHERE YEAR(data_entrada) = YEAR(now()) 
        ");
        return $query->result_array();
    }

    // resultado gerado caso o usuario pesquise por mes
    public function licenciamentos_mensais($mes) {
        $query = $this->db->query("SELECT sum(valor_total) as Total 
            FROM licenciamentos
            where MONTH(vencimento) =  MONTH('$mes');"
        );
        return $query->result_array();
    }

    // resultado gerado pelo ano
    public function licenciamentos_anuais() {
        $query = $this->db->query("SELECT sum(valor_total) as Total 
            FROM licenciamentos
            WHERE YEAR(vencimento) = YEAR(now());"
        );
        return $query->result_array();
    }

    // resultado gerado caso o usuario pesquise por mes
    public function abastecimentos_mensais($mes) {
        $query = $this->db->query("SELECT sum(valor_total) as Total 
            FROM abastecimentos
            where MONTH(data_abastecimento) =  MONTH('$mes');"
        );
        return $query->result_array();
    }

    // resultado gerado pelo ano
    public function abastecimentos_anuais() {
        $query = $this->db->query("SELECT sum(valor_total) as Total 
            FROM abastecimentos
            WHERE YEAR(data_abastecimento) = YEAR(now());"
        );
        return $query->result_array();
    }

    // resultado gerado caso o usuario pesquise por mes
    public function multas_mensais($mes) {
        $query = $this->db->query("SELECT sum(valor) as Total 
            FROM multas
            where MONTH(data) =  MONTH('$mes');"
        );
        return $query->result_array();
    }

    // resultado gerado pelo ano
    public function multas_anuais() {
        $query = $this->db->query("SELECT sum(valor) as Total 
            FROM multas
            WHERE YEAR(data) = YEAR(now());"
        );
        return $query->result_array();
    }
}