<?php

namespace App;

use Pecee\SimpleRouter\SimpleRouter;

class Router extends SimpleRouter
{
    public static function start(): void
    {
        require_once __DIR__."/../vendor/pecee/simple-router/helpers.php";
        require_once __DIR__."/../routes/web.php";
        require_once __DIR__."/../routes/api.php";

        parent::start();
    }
}