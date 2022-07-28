<?php

declare(strict_types=1);

namespace App\Database;

use App\Interface\DatabaseInterface;

class CoreDatabase
{
    private DatabaseInterface $conn;

    public function __construct(DatabaseInterface $database)
    {
        $this->conn = $database;
    }

    public function selectStatementsById()
    {
        $test = $this->conn->getDbConnection()->query("SELECT * FROM test WHERE name='Thiago'");
        $item = $test->fetch();
        return $item;
    }
}