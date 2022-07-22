<?php

use App\Database\Database;
use App\Interface\DatabaseInterface;

return [
    "PDO" => function(){
        return new PDO("mysql:dbname=wjcrypto; host=localhost", "root", "");
    },
    'DatabaseInterface' => DI\create(Database::class)
];