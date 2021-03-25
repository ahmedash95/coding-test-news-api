<?php

namespace App;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class Log
{
    /**
     * Monolog logger.
     *
     * @var Logger
     */
    private static $logger = null;

    /**
     * Channel name.
     *
     * @var string
     */
    protected static $channel = 'app';

    /**
     * Log level.
     *
     * @var string
     */
    protected static $level = Logger::DEBUG;

    /**
     * Get the logger instance.
     *
     * @return Logger
     */
    private static function getLogger()
    {
        if (!is_null(static::$logger)) {
            return static::$logger;
        }

        static::$logger = new Logger("app");
        return static::$logger;
    }

    /**
     * Change channel name.
     *
     * @param  string $name
     * @param  string $level
     * @return void
     */
    public static function setChannel($name, $level = Logger::DEBUG)
    {
        static::$channel = $name;
        static::$level = $level;
    }

    /**
     * Call the Logger methods statically.
     *
     * @param  string $name
     * @param  array $arguments
     * @return mixed
     */
    public static function __callStatic($name, $arguments)
    {
        $logger = static::getLogger();
        $channel = static::$channel;
        $level = static::$level;

        $handler = new StreamHandler(__DIR__ . "/../logs/{$channel}.log", $level);
        $logger->setHandlers([$handler]);

        return call_user_func_array([$logger, $name], $arguments);
    }
}
