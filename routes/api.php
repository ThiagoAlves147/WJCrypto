<?php

use App\Controllers\StatementController;
use App\Router;

Router::group(['prefix' => '/wjcrypto/api/'], function(){
    Router::get('statements', [StatementController::class, 'getStatements']);
});