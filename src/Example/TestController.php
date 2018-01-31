<?php

namespace App\Example;

use App\Facades\View;

/**
 * Test Controller
 *
 * @package App
 * @author  Rougin Royce Gutib <rougingutib@gmail.com>
 */
class TestController
{
    /**
     * Greets you with a "lorem ipsum" text.
     *
     * @return string
     */
    public function greet()
    {
        return View::make('fixture.test');
    }
}
