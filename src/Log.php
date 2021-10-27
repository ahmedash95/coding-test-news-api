<?php

namespace App;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class Log
{
    private $logger;

    public function __construct()
    {
        $this->logger = new Logger('news-providers');
        $this->logger->pushHandler(new StreamHandler(
            __DIR__ . DIRECTORY_SEPARATOR . '../logs' . DIRECTORY_SEPARATOR . 'app-errors.log',
            Logger::DEBUG
            )
        );
    }

    /**
     * @param string $message
     */
    public function log(string $message)
    {
        $this->logger->error($message);
    }
}