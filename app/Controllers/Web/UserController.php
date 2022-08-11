<?php

declare(strict_types=1);

namespace App\Controllers\Web;

use GuzzleHttp\Client;
use Pecee\Http\Response;
use Twig\Environment;

class UserController
{
    private Environment $template;
    private Client $client;

    public function __construct(Environment $template, Client $client)
    {
        $this->template = $template;
        $this->client = $client;
    }

    public function register()
    {
        $array = [
            'Nomes' => [
                'Nome' => "Thiago",
                'Sobrenome' => 'Alves Pereira'
            ]
        ];

        echo $this->template->render('register.php', $array);
    }

    public function login()
    {
        $url = "http://localhost:8080/wjcrypto/api/users/statements";
        $result = json_decode(file_get_contents($url));
        var_dump($result);
        // $teste = $this->client->request('GET', 'statements');
        // var_dump($teste);
        //echo $this->template->render('login.php');
    }
}