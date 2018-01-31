<?php

namespace App\Facades;

use Zapheus\Renderer\RendererInterface;

/**
 * View Facade
 *
 * @package App
 * @author  Rougin Royce Gutib <rougingutib@gmail.com>
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

    /**
     * Renders a file from a specified template.
     *
     * @param  string $template
     * @param  array  $data
     * @return string
     *
     * @throws \InvalidArgumentException
     */
    public static function make($template, $data = array())
    {
        return self::render($template, $data);
    }
}
