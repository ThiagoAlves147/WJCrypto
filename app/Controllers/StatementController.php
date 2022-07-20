<?php

namespace App\Controllers;

use App\Database\Database;

class StatementController
{
    private $database;

    function __construct(Database $database)
    {
        $this->database = $database;
    }

    public function getStatements(): string
    {
        $test = $this->database->conn->query("SELECT * FROM test");
        return $test;
    }
}