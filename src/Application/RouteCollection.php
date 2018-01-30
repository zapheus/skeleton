<?php

namespace App\Application;

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
     * Namespace applied to all controller routes.
     *
     * @var string
     */
    protected $namespace = 'App\Application\Controllers';

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

        // Always returns the array of Route instances.
        return $this->routes;
    }
}
