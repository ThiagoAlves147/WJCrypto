<?php

declare(strict_types=1);

namespace App\Models;

use App\Interface\UserModelInterface;

class User implements UserModelInterface
{
    private $userId;
    private $userName;
    private $userPassword;
    private $userCompanyName;
    private $userCpf;
    private $userCnpj;
    private $userRg;
    private $userStateRegistration;
    private $userBirthDay;
    private $userFoundationDay;
    private $userPhone;
    private $userAdress;

    public function getUserId($id)
    {
        $this->userId = $id;
    }
    public function setUserId()
    {
        return $this->userId;
    }

    public function getUserName($name)
    {
        $this->userName = $name;
    }
    public function setUserName()
    {
        return $this->userName;
    }

    public function getUserPassword($password)
    {
        $this->userPassword = $password;
    }
    public function setUserPassword()
    {
        return $this->userPassword;
    }

    public function getUserCompanyName($companyName)
    {
        $this->userCompanyName = $companyName;
    }
    public function setUserCompanyName()
    {
        return $this->userCompanyName;
    }

    public function getUserCpf($cpf)
    {
        $this->userCpf = $cpf;
    }
    public function setUserCpf()
    {
        return $this->userCpf;
    }

    public function getUserCnpj($cnpj)
    {
        $this->userCnpj = $cnpj;
    }
    public function setUserCnpj()
    {
        return $this->userCnpj;
    }

    public function getUserRg($rg)
    {
        $this->userRg = $rg;
    }
    public function setUserRg()
    {
        return $this->userRg;
    }

    public function getUserStateRegistration($stateRegistration)
    {
        $this->userStateRegistration = $stateRegistration;
    }
    public function setUserStateRegistration()
    {
        return $this->userStateRegistration;
    }

    public function getUserBirthDay($birthDay)
    {
        $this->userBirthDay = $birthDay;
    }
    public function setUserBirthDay()
    {
        return $this->userBirthDay;
    }

    public function getUserFoundationDay($foundationDay)
    {
        $this->userFoundationDay = $foundationDay;
    }
    public function setUserFoundationDay()
    {
        return $this->userFoundationDay;
    }

    public function getUserPhone($phone)
    {
        $this->userPhone = $phone;
    }
    public function setUserPhone()
    {
        return $this->userPhone;
    }

    public function getUserAdress($adress)
    {
        $this->userAdress = $adress;
    }
    public function setUserAdress()
    {
        return $this->userAdress;
    }
}