<?php

namespace App;

use Monolog\Handler\StreamHandler;

class Log
{
    private $logger;

    public function __construct()
    {
        $this->logger = new \Monolog\Logger('news-providers');
        $this->logger->pushHandler(
            new StreamHandler(__DIR__ . DIRECTORY_SEPARATOR . '../logs' . DIRECTORY_SEPARATOR . 'app-errors.log',
                \Monolog\Logger::DEBUG)
        );
    }

    public function log(string $message)
    {
        $this->logger->error($message);
    }
}