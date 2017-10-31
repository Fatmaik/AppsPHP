<?php
class ErrorController extends Controller{

    public function index() {
        $this->loadTemplate("error", array());
    }
}