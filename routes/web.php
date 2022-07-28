<?php

use App\Controllers\Api\StatementController;
use App\ClassLoader;
use App\Controllers\Web\TesteController;
use App\Router;

Router::csrfVerifier(new \App\Middlewares\CsrfVerifier());

Router::setCustomClassLoader(new ClassLoader());

Router::get('/', [StatementController::class, 'getStatements']);

Router::get('/login', [TesteController::class, 'request']);
Router::post('/login', [TesteController::class, 'request']);