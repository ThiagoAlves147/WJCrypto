<?php

declare(strict_types=1);

namespace App\Models;

use App\Interface\UserModelInterface;

class User implements UserModelInterface
{
    private $userId;
    private $userAccNumber;
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

    public function setUserId($id)
    {
        $this->userId = $id;
    }
    public function getUserId()
    {
        return $this->userId;
    }

    public function setUserAccountNumber($accNumber)
    {
        $this->userAccNumber = $accNumber;
    }
    public function getUserAccountNumber()
    {
        return $this->userAccNumber;
    }

    public function setUserName($name)
    {
        $this->userName = ucwords(strtolower(trim($name)));
    }
    public function getUserName()
    {
        return $this->userName;
    }

    public function setUserPassword($password)
    {
        $this->userPassword = password_hash($password, PASSWORD_DEFAULT);
    }
    public function getUserPassword()
    {
        return $this->userPassword;
    }

    public function setUserCompanyName($companyName)
    {
        $this->userCompanyName = ucfirst(strtolower(trim($companyName)));
    }
    public function getUserCompanyName()
    {
        return $this->userCompanyName;
    }

    public function setUserCpf($cpf)
    {
        $this->userCpf = $cpf;
    }
    public function getUserCpf()
    {
        return $this->userCpf;
    }

    public function setUserCnpj($cnpj)
    {
        $this->userCnpj = $cnpj;
    }
    public function getUserCnpj()
    {
        return $this->userCnpj;
    }

    public function setUserRg($rg)
    {
        $this->userRg = $rg;
    }
    public function getUserRg()
    {
        return $this->userRg;
    }

    public function setUserStateRegistration($stateRegistration)
    {
        $this->userStateRegistration = $stateRegistration;
    }
    public function getUserStateRegistration()
    {
        return $this->userStateRegistration;
    }

    public function setUserBirthDay($birthDay)
    {
        $this->userBirthDay = $birthDay;
    }
    public function getUserBirthDay()
    {
        return $this->userBirthDay;
    }

    public function setUserFoundationDay($foundationDay)
    {
        $this->userFoundationDay = $foundationDay;
    }
    public function getUserFoundationDay()
    {
        return $this->userFoundationDay;
    }

    public function setUserPhone($phone)
    {
        $this->userPhone = $phone;
    }
    public function getUserPhone()
    {
        return $this->userPhone;
    }

    public function setUserAdress($adress)
    {
        $this->userAdress = ucfirst(strtolower(trim($adress)));
    }
    public function getUserAdress()
    {
        return $this->userAdress;
    }
}