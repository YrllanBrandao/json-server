<?php

namespace App\Controllers;

use App\Models\JsonModel;
use MF\Controller\Action;

class JsonController extends Action
{

    public function saveJson()
    {

        $jsonModel = new JsonModel;
        $jsonReceived = $_POST['jsonValue'];
        $jsonModel->saveJson($jsonReceived);
    }
    public function showJson($path)
    {
        $jsonModel = new JsonModel;



        $sanitizedPath = str_replace('"', '', $path);
        
        $jsonModel->getJson($sanitizedPath);
    }
}