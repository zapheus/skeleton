<?php

namespace App\Facades;

use Zapheus\Renderer\RendererInterface;

/**
 * View Facade
 *
 * @package App
 * @author  Rougin Royce Gutib <rougingutib@gmail.com>
 *
 * @method string render(string $template, array $data = array())
 */
class View extends Facade
{
    /**
     * Returns the registered name of the instance.
     *
     * @return string
     */
    protected static function accessor()
    {
        return 'Zapheus\Renderer\RendererInterface';
    }
}
