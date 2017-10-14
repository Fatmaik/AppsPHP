<?php
// classe para a conexao com o banco de dados
class Connect {
    protected $dbase;
    public function __construct() {
        global $config;
        $host   = $config["host"];
        $dbname = $config["dbname"];
        $dbuser = $config["dbuser"];
        $dbpass = $config["dbpass"];
        // instancia de conexao com mysql
        $dsn = "mysql:dbname=".$dbname.";host=".$host;
        // atributo $dbase recebe a conexao com o mysql
        $this->dbase = new \PDO($dsn, $dbuser, $dbpass);
    }
}