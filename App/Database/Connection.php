<?php
namespace App\Database;

use \Dotenv\Dotenv;
use \PDO;
use \PDO\PDOException;

class Connection
{
    private $connection;
    public function __construct()
    {
        try {
            $dotenvPath = dirname(dirname(__DIR__));
            $dotenv = Dotenv::createImmutable($dotenvPath);
            $dotenv->load();

            $user = $_ENV['DB_USER'];
            $password = $_ENV['DB_PASSWORD'];
            $dsn = $_ENV['DSN'];

            $connection = new PDO($dsn, $user, $password);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this -> setConnection($connection);
        } catch (PDOException $error) {
            echo 'erro ao conectar com o db';
        }
    }

    public function setConnection($conn)
    {
        $this->connection = $conn;
    }
    public function getConnection()
    {
        return $this->connection;
    }
}