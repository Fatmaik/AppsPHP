<?php
require "Environment.php";
global $config;
$config = array();

if(ENVIRONMENT == "development_work") {
    $config['host']   = "localhost";
    $config['dbname'] = "cfcamboriu";
    $config['dbuser'] = "root";
    $config['dbpass'] = "";
}else if(ENVIRONMENT == "development_home") {
    $config['host']   = "localhost";
    $config['dbname'] = "cfcamboriu2";
    $config['dbuser'] = "root";
    $config['dbpass'] = "rancid";
}
