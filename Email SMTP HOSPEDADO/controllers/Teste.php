<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class teste extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('My_PHPMailer');
    }


    public function teste_email_envia(){
	$this->load->library('Sendmail');    
	$dados['email_enviado'] = $_SESSION['enviado'];    
    }
}
