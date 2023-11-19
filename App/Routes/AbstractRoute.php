<?php
    namespace App\Routes;   
    
abstract class AbstractRoute
{
    private $routes = [];
    public function __construct(){
        $this -> setRoutes();
    }
    public function setRoutes()
    {}
    public function getRoutes()
    {}
}