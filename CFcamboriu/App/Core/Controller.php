<?php
class Controller {
    
    public function loadView($viewName, $viewData = array()) {
        extract($viewData);
        require_once "App/View/".$viewName.".php";     
    }

    public function loadTemplate($viewName, $viewData = array()) {
        extract($viewData);
        require_once "App/View/Template.php";
    }
}