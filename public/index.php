<?php

use WJCrypto\controllers\UserController;
use Pecee\SimpleRouter;

require_once __DIR__."/../vendor/autoload.php";

$teste = new UserController();


echo $teste->teste();