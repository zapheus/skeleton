<?php

namespace App\Facades;

/**
 * Abstract Facade
 *
 * @package App
 * @author  Rougin Royce Gutib <rougingutib@gmail.com>
 *
 * @method static string accessor()
 */
abstract class Facade
{
    /**
     * Handle dynamic, static calls to the object.
     *
     * @param  string $method
     * @param  array  $arguments
     * @return mixed
     */
    public static function __callStatic($method, $arguments)
    {
        $class = \App\Bootstrap::make(static::accessor());

        $instance = array($class, $method);

        return call_user_func_array($instance, $arguments);
    }
}
