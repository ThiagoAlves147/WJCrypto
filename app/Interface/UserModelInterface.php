<?php

declare(strict_types=1);

namespace App\Interface;

Interface UserModelInterface
{
    public function getUserId($id);
    public function setUserId();

    public function getUserName($name);
    public function setUserName();

    public function getUserPassword($password);
    public function setUserPassword();

    public function getUserCompanyName($companyName);
    public function setUserCompanyName();

    public function getUserCpf($cpf);
    public function setUserCpf();

    public function getUserCnpj($cnpj);
    public function setUserCnpj();

    public function getUserRg($rg);
    public function setUserRg();

    public function getUserStateRegistration($stateRegistrarion);
    public function setUserStateRegistration();

    public function getUserBirthDay($birthDay);
    public function setUserBirthDay();

    public function getUserFoundationDay($foundationDay);
    public function setUserFoundationDay();

    public function getUserPhone($phone);
    public function setUserPhone();

    public function getUserAdress($adress);
    public function setUserAdress();
}