<?php

declare(strict_types=1);

namespace App\Interface;

Interface UserModelInterface
{
    public function setUserId($id);
    public function getUserId();

    public function setUserAccountNumber($accNumber);
    public function getUserAccountNumber();

    public function setUserName($name);
    public function getUserName();

    public function setUserPassword($password);
    public function getUserPassword();

    public function setUserCompanyName($companyName);
    public function getUserCompanyName();

    public function setUserCpf($cpf);
    public function getUserCpf();

    public function setUserCnpj($cnpj);
    public function getUserCnpj();

    public function setUserRg($rg);
    public function getUserRg();

    public function setUserStateRegistration($stateRegistrarion);
    public function getUserStateRegistration();

    public function setUserBirthDay($birthDay);
    public function getUserBirthDay();

    public function setUserFoundationDay($foundationDay);
    public function getUserFoundationDay();

    public function setUserPhone($phone);
    public function getUserPhone();

    public function setUserAdress($adress);
    public function getUserAdress();
}