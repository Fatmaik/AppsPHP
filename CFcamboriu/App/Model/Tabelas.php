<?php

class Tabelas extends Connect{
    protected $table;
    protected $rows;
    protected $done;

    public function __construct() {
        parent::__construct();
    }

    public function login($user, $password) {
        $array = array();
        $query = $this->dbase->prepare("SELECT * from usuarios WHERE user = :user and password = :password ");
        $query->bindValue(":user", $user);
        $query->bindValue(":password", $password);
        $query->execute();
        $array = $query->fetchAll(PDO::FETCH_ASSOC);
        return $array;
    }

    public function Select($tbname) {
        $array = array();
        $query = $this->dbase->query("SELECT * FROM $tbname");
        $array = $query->fetchAll(\PDO::FETCH_ASSOC);
        return $array;
    }

    // metodo pegando placa do veiculo reservado {
    public function joinPlacaReservasCondicao($table, $condicao = null, $valor = null) {

        $tableItem = $table . ".id_veiculo";
        $all = "reservas.id_reserva, reservas.id_condutor, condutores.nome, reservas.km_inicial, reservas.km_final, reservas.secretaria, reservas.data_saida,
        reservas.data_retorno, reservas.funcionario, reservas.tipo_reserva, reservas.destino, reservas.periodo_reservado, condicao, id_user";

        $array = array();
        $query = $this->dbase->query("SELECT condutores.nome, veiculos.placa, veiculos.id_veiculo, $tableItem, $all 
                                      from veiculos inner join $table on veiculos.id_veiculo = $tableItem 
                                      inner join condutores on condutores.id_condutor = reservas.id_condutor and $condicao = '$valor' 
                                      order by reservas.data_saida asc");
        $array = $query->fetchAll(PDO::FETCH_ASSOC);
        return $array;
    }
    

     // metodo pegando placa do veiculo reservado {
    public function joinPlacaReservas($table) {
        
        $tableItem = $table . ".id_veiculo";
        $all = "reservas.id_reserva, reservas.id_condutor, condutores.nome, reservas.km_inicial, reservas.km_final, reservas.secretaria, reservas.data_saida,
        reservas.data_retorno, reservas.funcionario, reservas.tipo_reserva, reservas.destino, reservas.periodo_reservado, condicao, id_user";

        $array = array();
        $query = $this->dbase->query("SELECT condutores.nome, veiculos.placa, veiculos.id_veiculo, $tableItem, $all 
                                        from veiculos inner join $table on veiculos.id_veiculo = $tableItem 
                                        inner join condutores on condutores.id_condutor = reservas.id_condutor 
                                        order by reservas.data_saida asc");
        $array = $query->fetchAll(PDO::FETCH_ASSOC);
        return $array;
    }

    // funcao que recebe o possivel responsavel vindo do metodo findResponsavel
    // ============== metodo sendo usado no controller =======================
    //                encargoController
    public function JoinPlacaLicenciamtos() {
        $array = array();
        $query = $this->dbase->query("SELECT licenciamentos.id_doc, veiculos.placa, 
            licenciamentos.renavan, 
            licenciamentos.vencimento, 
            licenciamentos.valor_total, 
            licenciamentos.status_pagamento
            from veiculos join licenciamentos 
            on licenciamentos.id_veiculo = veiculos.id_veiculo;
        ");
        $array = $query->fetchAll(PDO::FETCH_ASSOC);

        return $array;
    }

    // funcao que recebe o possivel responsavel vindo do metodo findResponsavel
    public function JoinPlacaMultas() {
        $array = array();
        $query = $this->dbase->query("SELECT veiculos.placa, 
            multas.*
            from multas join veiculos 
            on veiculos.id_veiculo = multas.id_veiculo;
        ");
        $array = $query->fetchAll(PDO::FETCH_ASSOC);

        return $array;
    }

    // funcao que receve o possivel responsavel vindo do metodo findResponsavel
    public function JoinPlacaManutencoes() {
        $array = array();
        $query = $this->dbase->query("SELECT veiculos.placa, 
            manutencoes.data_entrada, 
            manutencoes.data_saida, 
            manutencoes.valor_gasto, 
            manutencoes.descricao_servico,
            manutencoes.observacoes,
            manutencoes.odometro_manutencao,
            fornecedores.nome
            from veiculos join manutencoes 
            on manutencoes.id_veiculo = veiculos.id_veiculo
            join fornecedores on manutencoes.id_fornecedor = fornecedores.id_fornecedor;
        ");
        $array = $query->fetchAll(PDO::FETCH_ASSOC);

        return $array;
    }

    // metodo para achar manutencoes do veiculo especificado no parametro placa
    public function manutencoesUnitarias($placa = null) {
        $array = array();
        $query = $this->dbase->query("SELECT manutencoes.*, 
            veiculos.placa, 
            fornecedores.nome 
            from manutencoes join veiculos 
            on manutencoes.id_veiculo = '$placa' and veiculos.id_veiculo = manutencoes.id_veiculo
            join fornecedores on fornecedores.id_fornecedor = manutencoes.id_fornecedor;
        ");
        $array = $query->fetchAll(PDO::FETCH_ASSOC);
        return $array;
    }

    // metodo para achar abastecimento do veiculo especificado no parametro placa
    public function abastecimentosUnitarias($placa = null) {
        $array = array();
        $query = $this->dbase->query("SELECT abastecimentos.*, 
            veiculos.placa, 
            fornecedores.nome 
            from abastecimentos join veiculos 
            on abastecimentos.id_veiculo = '$placa' and veiculos.id_veiculo = abastecimentos.id_veiculo
            join fornecedores on fornecedores.id_fornecedor = abastecimentos.id_fornecedor;
        ");
        $array = $query->fetchAll(PDO::FETCH_ASSOC);
        return $array;
    }

    // funcao que receve o possivel responsavel vindo do metodo findResponsavel
    public function JoinPlacaAbastecimentos() {
        $array = array();
        $query = $this->dbase->query("SELECT veiculos.placa, 
            abastecimentos.data_abastecimento, 
            abastecimentos.tipo_combustivel, 
            abastecimentos.valor_total, 
            abastecimentos.litros_abastecidos,
            abastecimentos.valor_litro,
            abastecimentos.odometro,
            abastecimentos.tanque_cheio,
            fornecedores.nome
            from veiculos join abastecimentos
            on abastecimentos.id_veiculo = veiculos.id_veiculo
            join fornecedores on abastecimentos.id_fornecedor = fornecedores.id_fornecedor;
        ");
        $array = $query->fetchAll(PDO::FETCH_ASSOC);

        return $array;
    }

    // metodo que acha o possivel responsavel pela multa
    public function findResponsavelmulta() {
        $array = array();

        $query = $this->dbase->query(
            "SELECT multas.data, 
            veiculos.placa, multas.valor, multas.infracao, multas.nivel, multas.local, 
            reservas.funcionario responsavel_infracao, multas.pdf_multa, multas.id_multa
            from multas
            join reservas
            on condicao != 'livre' and multas.data > reservas.data_saida and multas.id_veiculo = reservas.id_veiculo
            or multas.data between reservas.data_saida and reservas.data_retorno and multas.id_veiculo = reservas.id_veiculo
            join veiculos on veiculos.id_veiculo = multas.id_veiculo");
        $array = $query->fetchAll(PDO::FETCH_ASSOC);
        // var_dump($array);
        return $array;
    }

    public function multasUnitarias($placa = null) {
        $array = array();
        $query = $this->dbase->query("SELECT multas.*, 
            veiculos.placa 
            from multas join veiculos 
            on multas.id_veiculo = '$placa'
            and veiculos.id_veiculo = multas.id_veiculo;");
        $array = $query->fetchAll(PDO::FETCH_ASSOC);
        return $array;
    }

    // metodo acha o item especifico que foi escolhido no menu de produtos
    public function filtro($tbname, $genero = null, $valor= null) {
        $array = array();
        $query = $this->dbase->query("SELECT * FROM $tbname WHERE $genero = '$valor' " );
        $array = $query->fetchAll(\PDO::FETCH_ASSOC);
        return $array;
    }

    public function insert($table, array $fields) { 
        try{
            // recebendo a array que vem por parametro na chamado do metodo
            $fields_keys = implode(',', array_keys($fields));
            $fields_values = "'".implode("','", array_values($fields))."'";
            $stmt = $this->dbase->prepare("INSERT INTO $table ({$fields_keys}) VALUES ({$fields_values})");
            echo "<br>metodo INSERT<br>";
            var_dump($stmt);
            $stmt->execute();

        }catch(PDOException $e) {
            die($e->getMessage());
        }
    }

    // public function update($tabela, $campo, $valor, $tabela_id, $id) {
    //     $table_id = "id_".$tabela;
    //     $query = $this->dbase->query("UPDATE $tabela SET $campo= '$valor' WHERE '$tabela_id' = $id");
    //     $query->execute();
    // }
    
    public function update($tabela, $campo, $valor, $condicao, $id) {
        $query = $this->dbase->prepare("UPDATE $tabela SET $campo = '$valor' WHERE $condicao = '$id' ");
        // echo "<br>metodo Update<br>";
        // var_dump($query);
        $query->execute();
        // return $array;
    }

    // metodo para alterar o dado do banco apos o usuario registrar o retorno
    public function update_retorno($id) {
        $query = $this->dbase->query("UPDATE reservas SET data_retorno=now(), condicao='livre' WHERE `id_reserva`= '$id'");
        $query->execute();
    }

    // metodo para retornar na pagina de reservas, em qual condicao se apresentao os veiculos;
    public function condicaoVeiculosPlaca($placa) {
        $array = array();
        $query = $this->dbase->query("SELECT veiculos.modelo,reservas.data_saida, veiculos.placa, reservas.condicao, reservas.funcionario
            from veiculos join reservas
            on veiculos.id_veiculo = reservas.id_veiculo where veiculos.id_veiculo = '$placa' order by data_saida desc limit 1;"
        );
        $array = $query->fetchAll(PDO::FETCH_ASSOC);
        return $array;
    }

    // metodo para retornar na pagina de reservas, em qual condicao se apresentao os veiculos;
    public function condicaoVeiculos() {
        $array = array();
        $query = $this->dbase->query("SELECT veiculos.modelo, veiculos.placa, reservas.condicao, reservas.funcionario, reservas.data_saida
            from veiculos join reservas
            on veiculos.id_veiculo = reservas.id_veiculo order by data_saida desc;"
        );
        $array = $query->fetchAll(PDO::FETCH_ASSOC);
        return $array;
    }


    public function delete(array $id) {

    }

    public function read(array $campos) {

    }


    // funcoa utilizada para redirecionar o produto selecionado para a area de descrição e logo apos, para o carrinho
    public function verReservas($id_veiculo, $data_saida) {
        // dados do veiculo para pesquisar possivel reserva em andamento
        $query = $this->dbase->query(
        "SELECT id_veiculo, data_saida, data_retorno FROM reservas 
        where id_veiculo = '$id_veiculo'
        and condicao != 'livre' 
        or id_veiculo = '$id_veiculo'
        and data_retorno > '$data_saida'
        ");
        $array = $query->fetchAll(\PDO::FETCH_ASSOC);

        // para que esteja td certo, o rowCount deve retornar 0 linhas
        $r = $this->rows = $query->rowCount();
        if($r > 0) {
            return $this->done = "Este veiculo ja está reservado nesta data, verifique os veículos que ainda nao estão. ";
        }else{
            return $this->done = "Reserva concluída";
        
        }
    }

    public function select_reservas_proprias($user) {
        $array = array();
        $query = $this->dbase->query("SELECT reservas.*, veiculos.placa, condutores.nome from reservas 
            join condutores on condutores.id_condutor = reservas.id_condutor
            join veiculos on veiculos.id_veiculo = reservas.id_veiculo and id_user = '$user';
        ");
        $array = $query->fetchAll(PDO::FETCH_ASSOC);
        return $array;
    }

}