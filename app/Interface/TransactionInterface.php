<?php

namespace App\Interface;

interface TransactionInterface
{
    public function setAccountNumber($accNumber);
    public function getAccountNumber();

    public function setTransictionValue($depositAmount);
    public function getTransictionValue();

    public function setBalance($balance);
    public function getBalance();
    
}