<?php 
    namespace App\Routes;

    use App\Routes\AbstractRoute;
    class IndexRoute extends abstractRoute{
        private $routes;
    
        public function setRoutes(){
            $routes['saveJson'] = [
                'action' => 'saveJson',
                'controller' => 'JsonController',
                'route'=> '/save-json'
            ];
            $this -> routes =  $routes;
        }
        public function getRoutes(){
            return $this -> routes;
        }
    }