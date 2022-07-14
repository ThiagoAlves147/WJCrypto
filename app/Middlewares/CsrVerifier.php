<?php

namespace app\Middlewares;

use Pecee\Http\Middleware\BaseCsrfVerifier;

class CsrfVerifier extends BaseCsrfVerifier
{
    protected $except = ['/api/*'];
}