<?php

use App\Controllers\StatementController;
use App\Router;

Router::group(['prefix' => '/wjcrypto/api/'], function(){
    Router::get('transfer/{id}', [StatementController::class, 'getStatements']);
    Router::get('deposit/{id}', [StatementController::class, 'getStatements']);
    Router::get('withdraw/{id}', [StatementController::class, 'getStatements']);
    Router::get('statements', [StatementController::class, 'getStatements']);
});