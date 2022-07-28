<?php

use App\Controllers\Api\StatementController;
use App\Controllers\Api\TestController;
use App\Controllers\Api\UserController;
use App\Router;

Router::group(['prefix' => '/wjcrypto/api/'], function(){
    Router::get('ping', [TestController::class, 'test']);
    Router::post('users/create', [UserController::class, 'createUser']);

    Router::get('transfer/{id}', [StatementController::class, 'getStatements']);
    Router::get('deposit/{id}', [StatementController::class, 'getStatements']);
    Router::get('withdraw/{id}', [StatementController::class, 'getStatements']);
    Router::get('statements', [StatementController::class, 'getStatements']);
});