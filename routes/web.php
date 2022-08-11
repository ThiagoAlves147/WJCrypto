<?php

use App\Controllers\Api\StatementController;
use App\ClassLoader;
use App\Controllers\Web\HomeController;
use App\Controllers\Web\TransactionController;
use App\Controllers\Web\UserController;
use App\Router;

Router::csrfVerifier(new \App\Middlewares\CsrfVerifier());

Router::setCustomClassLoader(new ClassLoader());

Router::group(['prefix' => '/wjcrypto'], function(){
    Router::get('/register', [UserController::class, 'register']);
    Router::get('/login', [UserController::class, 'login']);
    Router::get('/dashboard', [HomeController::class, 'showDashboard']);
    Router::get('/transfer', [TransactionController::class, 'showTransaction']);
    Router::get('/deposit', [TransactionController::class, 'showDeposit']);
    Router::get('/withdraw', [TransactionController::class, 'showWithdraw']);
});