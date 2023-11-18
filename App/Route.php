<?php

namespace App;

use MF\Init\Bootstrap;

class Route extends Bootstrap
{
    public function initRoutes()
    {
        $routes['index'] = [
            'route' => '/',
            'controller' => 'indexController',
            'action' => 'index'
        ];
        $this->setRoutes($routes);
    }
}