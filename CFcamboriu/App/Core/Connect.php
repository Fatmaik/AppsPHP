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

        }catch(PDOException $e){
            echo "<br>".PDO::ATTR_ERRMODE;
            echo "<br>".PDO::ERRMODE_EXCEPTION;
            echo "<br>Falha: ".$e->getMessage();
        }
        
    }
}