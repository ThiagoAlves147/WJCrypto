<?php

namespace App\Database;

use PDO;
use PDOException;

class Database
{
    public $conn;
    private $dbname;
    private $host;
    private $username;
    private $password;

    public function __construct()
    {
        $this->dbname = 'wjcrypto';
        $this->host = 'localhost';
        $this->username = 'root';
        $this->password = '';

        try{
            $this->conn = new PDO("mysql:dbname=$this->dbname;
                                  host=$this->host",
                                  $this->username,
                                  $this->password);
        } catch(PDOException $e){
            echo "Connection failed: ". $e->getMessage();
        }

    }


}