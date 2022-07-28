<?php

declare(strict_types=1);

namespace App\Interface;

interface DatabaseInterface
{
    public function getDbConnection(): object;
}