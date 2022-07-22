<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Interface\DatabaseInterface;
use Helper;

class StatementController
{
    private $database;

    function __construct()
    {
        $container = require_once __DIR__."/../DI/Builder.php";
        $this->database = $container->get(\DI\get(DatabaseInterface::class)); 
        
    }

    public function getStatements()
    {
        $test = $this->database->conn->query("SELECT * FROM test");
    }
}