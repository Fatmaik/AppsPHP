<?php
session_start();

require_once 'Config.php';
spl_autoload_register(function ($className) {
    if(file_exists("App/Controller/".$className.".php")) {
        require_once "App/Controller/".$className.".php";
    }
    if(file_exists("App/Model/".$className.".php")) {
        require_once "App/Model/".$className.".php";
    }
    if(file_exists("App/Core/".$className.".php")) {
        require_once "App/Core/".$className.".php";
    }
});

$c = new Core();
$c->run();
?>
