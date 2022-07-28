<?php

declare(strict_types=1);

namespace App\Database;

use App\Interface\DatabaseInterface;
use PDO;

class Database implements DatabaseInterface
{
    private PDO $conn;

    function __construct(PDO $database)
    {
        $this->conn = $database;
    }

    public function getDbConnection(): object
    {
        return $this->conn;
    }
}