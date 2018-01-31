<?php

namespace App\Example;

use Zapheus\Routing\Router;

/**
 * Route Collection
 *
 * @package App
 * @author  Rougin Royce Gutib <rougingutib@gmail.com>
 */
class RouteCollection extends Router
{
    /**
     * Namespace applied to all class-based routes.
     *
     * @var string
     */
    protected $namespace = 'App\Example';

    /**
     * Returns an array of route instances.
     *
     * @return \Zapheus\Routing\Route[]
     */
    public function routes()
    {
        $this->get('/test', 'TestController@greet');

        return $this->routes;
    }
}
