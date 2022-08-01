<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT , DELETE, OPTIONS");

use App\Controllers\Api\StatementController;
use App\Controllers\Api\TestController;
use App\Controllers\Api\TransactionController;
use App\Controllers\Api\UserController;
use App\Router;

Router::group(['prefix' => '/wjcrypto/api/'], function(){
    Router::get('ping', [TestController::class, 'test']);
    Router::post('users/create', [UserController::class, 'createUser']);
    Router::post('users/deposit', [TransactionController::class, 'depositValue']);
    Router::post('users/transfer', [TransactionController::class, 'transferValue']);
    Router::post('users/withdrawn', [TransactionController::class, 'withdrawnValue']);
    
    Router::get('users/statements', [StatementController::class, 'getStatements']);
});