<?php
// classe para a conexao com o banco de dados
class Connect {
    protected $dbase;
    public function __construct() {

        try{
            global $config;
            $host   = $config["host"];
            $dbname = $config["dbname"];
            $dbuser = $config["dbuser"];
            $dbpass = $config["dbpass"];
            
            // instancia de conexao com mysql
            $dsn = "mysql:dbname=".$dbname.";host=".$host;

            // atributo $dbase recebe a conexao com o mysql
            $this->dbase = new \PDO($dsn, $dbuser, $dbpass);
            $this->dbase->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // isso corrige os problemas de acentuação de dados vindo do DB
            $this->dbase->query("SET NAMES 'utf8'");
            $this->dbase->query('SET character_set_connection=utf8');
            $this->dbase->query('SET character_set_client=utf8');
            $this->dbase->query('SET character_set_results=utf8');

        }catch(PDOException $e){
            echo "<br>".PDO::ATTR_ERRMODE;
            echo "<br>".PDO::ERRMODE_EXCEPTION;
            echo "<br>Falha: ".$e->getMessage();
        }
        
    }
}