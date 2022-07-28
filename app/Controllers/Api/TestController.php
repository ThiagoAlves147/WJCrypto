<?php

declare(strict_types=1);

namespace App\Controllers\Api;

class TestController
{
    public function test(): string
    {
        $teste = [
            'pong' => true,
            'error' => "nada"
        ];

        $api = json_encode($teste);

        return $api;
    }
}