<?php
namespace App\Models;

use App\Database\Connection;
use \PDO\PDOException;

class JsonModel
{

    function saveJson($json)
    {
        try {
            $jsonEncoded = json_encode($json);
            $sql = "
                INSERT INTO registers(json) VALUES (:json)
                ";

            $conn = new Connection;
            $connection = $conn->getConnection();
            $statement = $connection->prepare($sql);

            $statement->bindParam(':json', $jsonEncoded);

            $statement->execute();

            http_response_code(201);

        } catch (PDOException $error) {
            echo 'An error has ocurred during the DB; Connection!';
        }
    }
    
    function generatePath()
    {
        $alphabet = 'abcdefghijklmnopqrstuvwxyz';
        $numbers = '0123456789';
        $path = '';
        for ($i = 0; $i < 6; $i++) {
            $randomCharacter = rand(0, 1);

            switch ($randomCharacter) {
                case 0:
                    $indexAlphabet = rand(0, 25);
                    $path .= $alphabet[$indexAlphabet];

                    break;
                case 1:
                    $indexNumbers = rand(0, 9);
                    $path .= $numbers[$indexNumbers];
                    break;
            }
        }

        return $path;
    }

}