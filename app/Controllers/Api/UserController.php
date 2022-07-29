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
        // $teste = $this->helper->input_exist(['nome', 'sobrenome', 'email']);

        // $nome = $request->getInputHandler()->value('nome');
        // $sobrenome = $request->getInputHandler()->value('sobrenome');
        // $email = $request->getInputHandler()->value('email');

        // $this->conn->getDbConnection()->query("INSERT INTO test VALUES('$nome', '$sobrenome', '$email')");

        // if(input()->exists(['nome', 'sobrenome', 'email'])){
        //     $nome = $request->getInputHandler()->value('nome');
        //     $sobrenome = $request->getInputHandler()->value('sobrenome');
        //     $email = $request->getInputHandler()->value('email');

        //     $this->conn->getDbConnection()->query("INSERT INTO test VALUES('$nome', '$sobrenome', '$email')");
        // }

        self::$user->setUserAccountNumber(1234567);
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