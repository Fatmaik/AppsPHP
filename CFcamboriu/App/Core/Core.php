<?php
class Core{
    private $currentAction;

    public function run() {
        // recebe a url acessada e apaga td que estivar antes deo index.php
        $url = explode("index.php", $_SERVER["PHP_SELF"]);
        // echo "<br>". $_SERVER["PHP_SELF"];
        // $url sera oque estiver depois de index.php
        $url = end($url);
    
        // params ira armazenar os parametro de url amigaveis para consultas futuras actions
        $params = array();
        if(!empty($url)) {
            // precisa usar explode novamente para retirar a / do controller
            $url = explode("/", $url);
            // retirar espaço em branco que exite no inicio
            array_shift($url);
            
            // classes do Controller possuem a palavra Controller no fim.
            $currentController = $url[0]."Controller";
            
            // apos pegar o controller , a url deleta para armazenar o parametro para o array $params
            array_shift($url);

            // se for acessado algun diretorio da aplicacao $url recebe [1]
            if(isset($url[0])) {
                $currentAction = $url[0];
                // apos pegar a action , a url deleta para armazenar o parametro para o array $params
                array_shift($url);
            }else {
                $currentAction = "index";
            }
            if(count($url) > 0) {
                $params = $url;
            }
        }else{
            $currentController = "homeController";
            $currentAction     = "index";
        }
        // echo "<br>".$currentController;
        // echo "<br>".$currentAction;
        // chamando o controller atual
        $c = new $currentController();
        // chamando a action atual e parametros da url amigavel,caso exista algum
        call_user_func_array(array($c, $currentAction), $params);
    }
}