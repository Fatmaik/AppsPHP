<?php

class UserLogin extends Tabelas{
    protected $user;
    protected $password;

    protected function getUser() {
        return $this->user;
    }

    protected function getPassword() {
        return $this->password;
    }

    protected function setUser($user) {
        $this->user = $user;
    }

    protected function setPassword($passorword) {
        $this->password = $passorword;
    }

    // public function confirmUser($user, $pass) {
    //     $dados = $this->Select("usuarios");

    //     foreach($dados as $info) {
    //         if($info["user"] == $user && $info["password"] == md5($pass)) {
    //             $_SESSION["logado"] = "true";
    //             header("location: /home/inicio");
    //         }else{
    //             $_SESSION["logado"] = "false";
                
    //         }
    //     }
    // }

    public function getSession() {
        if($_SESSION["logado"] != "true") {
            session_destroy();
            header("location: /index.php");
        }
    }
}