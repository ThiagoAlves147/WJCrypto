<?php

namespace App\Models;

use App\Interface\TransactionInterface;

class Transaction implements TransactionInterface
{
    private $accNumber;
    private $transictionValue;
    private $balance;

    public function setAccountNumber($accNumber)
    {
        $this->accNumber = $accNumber;
    }
    public function getAccountNumber()
    {
        return $this->accNumber;
    }

    public function setTransictionValue($transictionValue)
    {
        $this->transictionValue = $transictionValue;
    }
    public function getTransictionValue()
    {
        return $this->transictionValue;
    }

    public function setBalance($balance)
    {
        $this->balance = $balance;
    }
    public function getBalance()
    {
        return $this->balance;
    }
}