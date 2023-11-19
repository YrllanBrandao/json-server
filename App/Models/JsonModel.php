<?php
namespace App\Models;

use App\Database\Connection;
use \PDO;
use \PDO\PDOException;

class JsonModel
{

    function saveJson($json)
    {
        try {
            $jsonEncoded = json_encode($json);
            $sql = "
                INSERT INTO registers(json, path) VALUES (:json, :path)
                ";

            $conn = new Connection;
            $connection = $conn->getConnection();
            $statement = $connection->prepare($sql);
            $generatedPath = $this->generatePath();
            $statement->bindParam(':json', $jsonEncoded);
            $statement->bindParam(':path', $generatedPath);

            $statement->execute();

            http_response_code(201);

        } catch (PDOException $error) {
            echo 'An error has ocurred during the DB; Connection!';
        }
    }
    function verifyIfPathExists($path)
    {
        $sql = '
        SELECT * FROM registers WHERE path = :path
        ';
        $conn = new Connection;
        $connection = $conn->getConnection();
        $statement = $connection->prepare($sql);

        $statement->bindParam(':path', $path);

        $statement->execute();

        $queryResult = $statement->fetch(PDO::FETCH_ASSOC);

        return !empty($queryResult);
    }
    function generatePath()
    {
        $alphabet = 'abcdefghijklmnopqrstuvwxyz';
        $numbers = '0123456789';
        $path = '';
        $pathExists;
        do {
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

            $pathExists = $this->verifyIfPathExists($path);
        } while ($pathExists);

        return $path;
    }
    public function getSavedPaths()
    {
        $sql = '
        SELECT path FROM registers
        ';
        $conn = new Connection;
        $connection = $conn->getConnection();
        $statement = $connection->prepare($sql);
        $statement->execute();
        $queryResult = $statement->fetchAll(PDO::FETCH_ASSOC);

        if (empty($queryResult)) {
            return [
                'route' => '/404',
                'controller' => 'indexController',
                'action' => 'notFound',
            ];
        }

        return $queryResult;
    }
}