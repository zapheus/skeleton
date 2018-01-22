<?php

namespace App\Controllers;

/**
 * Greet Controller
 *
 * @package App
 * @author  Rougin Royce Gutib <rougingutib@gmail.com>
 */
class GreetController
{
    /**
     * Greets a specified name.
     *
     * @return string
     */
    public function greet($name = 'Stranger')
    {
        return 'Greetings, ' . $name . '!';
    }

    /**
     * Shouts the specified name.
     *
     * @return string
     */
    public function scream()
    {
        return strtoupper($this->greet());
    }
}
