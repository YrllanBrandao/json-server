<?php
    namespace App\Controllers;
    
    use MF\Controller\Action;

class indexController extends Action{
        function index(){
            $this -> render("index");
        }
}