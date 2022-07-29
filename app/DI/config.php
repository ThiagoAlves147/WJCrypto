<?php

use App\Database\Database;
use App\Interface\DatabaseInterface;
use App\Interface\TransactionInterface;
use App\Interface\UserModelInterface;
use App\Models\Transaction;
use App\Models\User;
use DI\Container;
use Psr\Container\ContainerInterface;

use function DI\factory;

return [
    PDO::class => factory(function () {
        return new PDO("mysql:host=localhost;dbname=wjcrypto", "root", "");
    }),
    DatabaseInterface::class => factory(function (ContainerInterface $container) {
        return new Database($container->get(PDO::class));
    }),
    UserModelInterface::class => factory(function () {
        return new User();
    }),
    TransactionInterface::class => factory(function () {
        return new Transaction();
    })
];