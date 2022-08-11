<?php

use App\Database\Database;
use App\Interface\DatabaseInterface;
use App\Interface\TransactionInterface;
use App\Interface\UserModelInterface;
use App\Logs\MainLogger;
use App\Models\Transaction;
use App\Models\User;
use DI\Container;
use GuzzleHttp\Client;
use Monolog\Logger;
use Psr\Container\ContainerInterface;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

use function DI\factory;

return [
    PDO::class => factory(function () {
        return new PDO("mysql:host=localhost;dbname=wjcrypto", "wj", "12345");
    }),
    DatabaseInterface::class => factory(function (ContainerInterface $container) {
        return new Database($container->get(PDO::class));
    }),
    MainLogger::class => factory(function () {
        return new MainLogger(new Logger('txt'));
    }),
    Environment::class => factory(function () {
        $loader = new FilesystemLoader(__DIR__."/../Views");
        return new Environment($loader);
    }),
    Client::class => factory(function () {
        return new Client(['base_uri' => 'http://localhost:8000/wjcrypto/api/users/']);
    }),
    UserModelInterface::class => factory(function () {
        return new User();
    }),
    TransactionInterface::class => factory(function () {
        return new Transaction();
    })
];