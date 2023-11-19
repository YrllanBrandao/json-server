<?php
namespace App\Routes;

use App\Models\JsonModel;
use App\Routes\AbstractRoute;

class IndexRoute extends abstractRoute
{
    private $routes;

    public function setRoutes()
    {

        $jsonModel = new JsonModel;

        $routes['saveJson'] = [
            'action' => 'saveJson',
            'controller' => 'JsonController',
            'route' => '/save-json',
        ];

        $savedPaths = $jsonModel->getSavedPaths();

        if ($savedPaths['route' !== '/404']) {
            foreach($savedPaths as $paths){
                $routes[$paths['path']] = [
                    'route' => '/' . $paths['path'],
                    'controller' => 'jsonController',
                    'action' => 'showJson("' . $paths['path'] . '")'
                ];
            }
        }

        $this->routes = $routes;
    }
    public function getRoutes()
    {
        return $this->routes;
    }
}