<?php

declare(strict_types=1);

namespace DesignPatterns\Src\CreationalPatterns\Singleton\Singletons;

use Exception;

class Singleton
{
    private static array $instances = [];

    public function __construct()
    {}

    /**
     * @throws Exception
     */
    public function __wakeup()
    {
        throw new Exception("Cannot unserialize singleton");
    }

    public static function getInstance()
    {
        $subclass = static::class;

        if (!isset(self::$instances[$subclass])) {
            self::$instances[$subclass] = new static();
        }

        return self::$instances[$subclass];
    }
}