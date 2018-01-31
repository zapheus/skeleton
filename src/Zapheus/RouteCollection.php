<?php

namespace App\Zapheus;

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
    protected $namespace = 'App\Zapheus';

    /**
     * Returns an array of route instances.
     *
     * @return \Zapheus\Routing\Route[]
     */
    public function routes()
    {
        $this->get('/{name}', 'GreetController@greet');

        $this->get('/', 'GreetController@greet');

        $this->get('/scream', 'GreetController@scream');

        return $this->routes;
    }
}
