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
    $config['dbname'] = "cfcamboriu";
    $config['dbuser'] = "root";
    $config['dbpass'] = "rancid";
}else if(ENVIRONMENT == "development_prod") {
    $config['host']   = "mysql857.umbler.com";
    $config['dbname'] = "cfcamboriu";
    $config['dbuser'] = "odpcamboriu";
    $config['dbpass'] = "cfcamboriu_root";
}
