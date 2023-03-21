<?php

declare(strict_types=1);

namespace MyAwesomeNamespace;

/**
 * @author Pavel Golikov <pgolikov327@gmail.com>
 */
class ExampleClass
{
    public function __construct()
    {
        echo "Hello from " . static::class . "\n";
    }
}