<?php

declare(strict_types=1);

namespace App\Middlewares;

use Pecee\Http\Middleware\IMiddleware;
use Pecee\Http\Request;

class Auth implements IMiddleware
{
    public function __construct()
    {   
        
    }

    public function handle(Request $request): void
    {

    }
}