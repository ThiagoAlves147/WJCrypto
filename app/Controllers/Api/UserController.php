<?php

declare(strict_types=1);

namespace App\Controllers\Api;

use App\Interface\DatabaseInterface;
use Pecee\Http\Request;

class UserController
{
    private DatabaseInterface $conn;

    public function __construct(DatabaseInterface $database)
    {
        $this->conn = $database;
    }

    public function createUser(Request $request): void
    {
        $nome = $request->getInputHandler()->value('nome');
        $sobrenome = $request->getInputHandler()->value('sobrenome');
        $email = $request->getInputHandler()->value('email');

        $this->conn->getDbConnection()->query("INSERT INTO test(name, sobrenome, email) VALUES ('$nome', '$sobrenome', '$email')");
    }   
}