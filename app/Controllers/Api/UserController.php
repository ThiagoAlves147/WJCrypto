<?php

declare(strict_types=1);

namespace App\Controllers\Api;

use App\Database\CoreDatabase;
use App\Helper;
use App\Interface\DatabaseInterface;
use App\Interface\UserModelInterface;
use Pecee\Http\Request;

class UserController
{
    public CoreDatabase $query;
    private static UserModelInterface $user;
    private Helper $helper;

    public function __construct(
        CoreDatabase $query,
        UserModelInterface $user, 
        Helper $helper,
    )
    {
        $this->helper = $helper;
        $this->query = $query;
        self::$user = $user;
    }

    public function createUser(Request $request): void
    {
        $inputs = $this->helper->input_exist([
            'name', 
            'password', 
            'cpf', 
            'rg', 
            'data_nasc', 
            'phone', 'adress'
        ]);

        if($inputs){
            self::$user->setUserAccountNumber(mt_rand(300000000, 399999999));
            self::$user->setUserName($request->getInputHandler()->value('name'));
            self::$user->setUserPassword($request->getInputHandler()->value('password'));
            self::$user->setUserCpf($request->getInputHandler()->value('cpf'));
            self::$user->setUserRg($request->getInputHandler()->value('rg'));
            self::$user->setUserBirthDay($request->getInputHandler()->value('data_nasc'));
            self::$user->setUserPhone($request->getInputHandler()->value('phone'));
            self::$user->setUserAdress($request->getInputHandler()->value('adress'));
    
            $this->query->insertNewUser(1, self::$user);
        }

    }   
}