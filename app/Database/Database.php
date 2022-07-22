<?php

declare(strict_types=1);

namespace App\Database;

use App\Interface\DatabaseInterface;
use PDO;

class Database implements DatabaseInterface
{
    private $conn;

    function __construct(PDO $database)
    {
        $this->conn = $database;
    }

    public function getDbConnection(): object
    {
        return $this->conn;
    }
    // private $dbname;
    // private $host;
    // private $username;
    // private $password;

    // public function __construct()
    // {
    //     $this->dbname = 'wjcrypto';
    //     $this->host = 'localhost';
    //     $this->username = 'root';
    //     $this->password = '';

    //     try{
    //         $this->conn = new PDO("mysql:dbname=$this->dbname;
    //                               host=$this->host",
    //                               $this->username,
    //                               $this->password);
    //     } catch(PDOException $e){
    //         echo "Connection failed: ". $e->getMessage();
    //     }

}