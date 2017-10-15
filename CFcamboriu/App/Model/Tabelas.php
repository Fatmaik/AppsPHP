<?php

class Tabelas extends Connect{
    protected $table;
    
    public function __construct() {
        parent::__construct();
    }
    
    public function Select($tbname) {
        $array = array();
        $query = $this->dbase->query("SELECT * FROM $tbname");
        $array = $query->fetchAll(\PDO::FETCH_ASSOC);
        return $array;
    }

    public function joinPlaca($table) {
        $tb_veiculos = "tb_veiculos";
        $tb_veiculos_placa = "tb_veiculos.placa";
        $tb_veiculos_id_veiculo = "tb_veiculos.id_veiculo";
        $tableItem = $table . ".tb_veiculos_id_veiculo";
        $tb_condutores_id_condutor = "tb_condutores.id_condutor";
        $tb_reservas_tb_condutores_id_condutor = "tb_reservas.tb_condutores_id_condutor";
        $all = "tb_reservas.tb_condutores_id_condutor, tb_condutores.nome, tb_reservas.km_inicial, tb_reservas.km_final, tb_reservas.secretaria, tb_reservas.data_saida,
        tb_reservas.data_retorno, tb_reservas.funcionario, tb_reservas.tipo_reserva, tb_reservas.destino, tb_reservas.periodo_reservado";
        $array = array();
        $query = $this->dbase->query("SELECT $tb_veiculos_placa, $tb_veiculos_id_veiculo, $tableItem, $all from tb_veiculos inner join $table on $tb_veiculos_id_veiculo = $tableItem inner join tb_condutores on $tb_condutores_id_condutor = $tb_reservas_tb_condutores_id_condutor order by data_saida asc");
        $array = $query->fetchAll(PDO::FETCH_ASSOC);
        return $array;
    }

    // metodo acha o item especifico que foi escolhido no menu de produtos
    public function filtro($tbname, $genero) {
        $array = array();
        $query = $this->dbase->query("SELECT * FROM $tbname WHERE genero = '$genero' " );
        $array = $query->fetchAll(\PDO::FETCH_ASSOC);
        return $array;
    }

    public function insert($table, array $fields) { 
        try{
            // recebendo a array que vem por parametro na chamado do metodo
            $fields_keys = implode(',', array_keys($fields));
            $fields_values = "'".implode("','", array_values($fields))."'";
            $stmt = $this->dbase->prepare("INSERT INTO $table ({$fields_keys}) VALUES ({$fields_values})");
            var_dump($stmt);
            $stmt->execute();

        }catch(PDOException $e) {
            die($e->getMessage());
        }
    }

    public function update(array $campos_values) {
        
    }

    public function delete(array $id) {
        
    }

    public function read(array $campos) {
        
    }


    // funcoa utilizada para redirecionar o produto selecionado para a area de descrição e logo apos, para o carrinho
    public function ver($tabela, $id) {
        $query = $this->dbase->query("SELECT * FROM $tabela WHERE id = '$id' ");
        $array = $query->fetchAll(\PDO::FETCH_ASSOC);
        return $array;
    }
   
}