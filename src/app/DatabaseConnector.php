<?php 
namespace App;

use mysqli;
use PDO;

class DatabaseConnector
{
    public $host;
    public $username;
    public $password;
    public $connection;

    public function register()
    {
        $this->host     = $_ENV['DB_HOST'];
        $this->username = $_ENV['DB_USERNAME'];
        $this->password = $_ENV['DB_PASSWORD'];
        $this->database = $_ENV['DB_NAME'];
        return $this;
    }

}