<?php

namespace App;

use App\Routes\IndexRoute;
use MF\Init\Bootstrap;

class Route extends Bootstrap
{
    private function mergeRoutes()
    {
        $args = func_get_args();

        $allArguments = [];

        foreach ($args as $arg) {
            $allArguments += $arg;
        }
        return $allArguments;
    }
    public function initRoutes()
    {
        $indexRoute = new IndexRoute;

        $indexRoutes = $indexRoute->getRoutes();

        $routes['index'] = [
            'route' => '/',
            'controller' => 'IndexController',
            'action' => 'index',
        ];

       
        $AllRoutes = $this -> mergeRoutes($indexRoutes, $routes);
    
        $this->setRoutes($AllRoutes);
    }
}