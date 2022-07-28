<?php

declare(strict_types=1);

namespace App\Controllers\Api;

use App\Database\CoreDatabase;
use App\Helper;
use App\Interface\DatabaseInterface;
use App\Interface\UserModelInterface;
use Pecee\Http\Request;

class StatementController
{
    private DatabaseInterface $conn;
    private UserModelInterface $user;
    private CoreDatabase $query;

    public function __construct(DatabaseInterface $database, UserModelInterface $user, CoreDatabase $query)
    {
        $this->conn = $database;
        $this->user = $user;
        $this->query = $query;
    }

    public function getStatements(Request $request)
    {
        $teste = $this->query->selectStatementsById();

        $teste = [
            'nome' => $teste['name'],
            'sobrenome' => $teste['sobrenome'],
            'email' => $teste['email']
        ];

        return json_encode($teste);
    }
}