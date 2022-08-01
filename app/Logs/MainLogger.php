<?php

declare(strict_types=1);

namespace App\Logs;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class MainLogger
{
    private Logger $logger;

    public function __construct(Logger $logger)
    {
        $this->logger = $logger;
    }

    public function setLog($msg, array $context = [])
    {
        $this->logger->pushHandler(new StreamHandler(dirname(__FILE__).'/logs.txt'));
        $this->logger->info($msg, $context);
    }

}