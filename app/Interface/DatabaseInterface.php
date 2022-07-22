<?php

namespace App\Interface;

interface DatabaseInterface
{
    public function getDbConnection(): object;
}