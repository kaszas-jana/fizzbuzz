<?php
declare(strict_types = 1);

namespace App\Output;

trait OutputSingletonTrait
{
    private static $instance = null;

    public static function getInstance(): self
    {
        if (null === static::$instance) {
            static::$instance = new static();
        }

        return static::$instance;
    }

    public function __wakeup()
    {
        throw new \RuntimeException("Singleton!");
    }

    private function __construct() {
        /* keep it singleton */
    }

    private function __clone() {
        /* keep it singleton */
    }
}