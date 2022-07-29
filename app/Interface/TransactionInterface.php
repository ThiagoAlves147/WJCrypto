<?php

namespace App\Interface;

interface TransactionInterface
{
    public function setAccountNumber();
    public function getAccountNumber();

    public function setDepositAmount();
    public function getDepositAmount();

    public function setBalance();
    public function getBalance();
    
}