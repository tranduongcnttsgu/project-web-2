<?php

namespace core;

use PDO;
use PDOException;

class Database
{
    private string $host;
    private string $name;
    private string $user;
    private string $password;
    public function __construct($config)
    {

        $this->host = $config['dbServer'];
        $this->name = $config['dbname'];
        $this->user = $config['user'];
        $this->password = $config['password'];
    }

    public function  connect(): PDO
    {
        try {
            $dsn = "mysql:host={$this->host};dbname={$this->name};";
            return new PDO($dsn, $this->user, $this->password);
        } catch (PDOException $e) {
            die("ERROR Connect  database false, message:" . $e->getMessage());
        }
    }
}
