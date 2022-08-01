<?php

namespace App\Controllers\Web;

use Pecee\Http\Request;

class TesteController
{
    public function request(Request $request)
    {
        echo "MEU NOME É THIAGO ALVES PEREIRA E EU MORO EM MANHUAÇU";

        // $opts = array('http'=>array('header' => "User-Agent:MyAgent/1.0\r\n")); 
        // //Basically adding headers to the request
        // $context = stream_context_create($opts);
        // $url = "http://localhost:8000/wjcrypto/api/users/statements";
        // $html = file_get_contents($url,false,$context);

        //var_dump($html);
        // header("Content-type: application/json");
        $url = "https://localhost:8000/wjcrypto/api/users/statements";
        $result = json_decode(file_get_contents($url));
        var_dump($result);

        // $options = array(
        //     'http' => array(
        //         'header'  =>  "Accept:application/json\r\n" .
        //                       "X-Requested-With:XMLHttpRequest\r\n",
        //         'method'  => 'GET'
        //     ),
        // );

        // $options = array(
        //     'http'=>array(
        //       'method'=>"GET",
        //       'header'=>"Host:localhost:8000\r\n"
        //     )
        //   );
          
        //   $context = stream_context_create($options);
          
        //   $file = file_get_contents('http://localhost:8000/wjcrypto/api/users/statements', false, $context);
        //   var_dump($file);
        
    }
}