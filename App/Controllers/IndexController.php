<?php
    namespace App\Controllers;
    
    use MF\Controller\Action;

class IndexController extends Action{
        function index(){
            $this -> render("index");
        }
}