<?php

use App\Controllers\StatementController;
use App\Router;
use Pecee\Http\Middleware\BaseCsrfVerifier;

Router::csrfVerifier(new \App\Middlewares\CsrfVerifier());
Router::setDefaultNamespace('\App\Controllers');

Router::get('/', [StatementController::class, 'Hello']);