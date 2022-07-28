<?php

namespace App\Controllers\Web;

use Pecee\Http\Request;

class TesteController
{
    public function request(Request $request)
    {
        $teste = $request->getInputHandler()->value('nome');
        var_dump($teste);
    }
}