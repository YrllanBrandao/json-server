<?php

    namespace App\Controllers;
    use MF\Controller\Action;
    use App\Models\JsonModel;
    
    class JsonController extends Action {
        
        function saveJson(){
            
        $jsonModel = new JsonModel;
                $jsonReceived = $_POST['jsonValue'];
            $jsonModel -> saveJson($jsonReceived);
        }
    }