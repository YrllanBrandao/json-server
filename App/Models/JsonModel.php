<?php
namespace App\Models;

use App\Database\Connection;
use \PDO\PDOException;

class JsonModel
{

    function saveJson($json)
    {
        try {

            $fakeJson = [['name' => 'teste1']];

            $fakeJsonEncoded = json_encode($fakeJson);
            $sql = "
                INSERT INTO registers(json) VALUES (:json)
                ";

            $conn = new Connection;
            $connection = $conn -> getConnection();
            $statement = $connection->prepare($sql);

            $statement->bindParam(':json', $fakeJsonEncoded);

            $statement->execute();

            echo 'tudo certo aqui';
            http_response_code(201);

        } catch (PDOException $error) {
            echo 'An error has ocurred during the DB; Connection!';
        }
    }
}