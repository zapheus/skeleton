<?php

namespace App\Zapheus;

use App\Facades\View;

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
        $data = array('name' => (string) $name);

        return View::render('greet', $data);
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
