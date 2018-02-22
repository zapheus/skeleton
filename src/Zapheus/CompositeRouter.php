<?php

namespace App\Zapheus;

use Zapheus\Routing\Router;
use Zapheus\Routing\RouterInterface;

/**
 * Route Collection
 *
 * @package App
 * @author  Rougin Royce Gutib <rougingutib@gmail.com>
 */
class CompositeRouter extends Router
{
    /**
     * Namespace applied to all class-based routes.
     *
     * @var string
     */
    protected $namespace = 'App\Zapheus';

    /**
     * Merges the new route instances.
     *
     * @param  \Zapheus\Routing\RouterInterface $router
     * @return self
     */
    public function merge(RouterInterface $router)
    {
        $routes = $router->routes();

        $this->routes = array_merge($this->routes, $routes);

        return $this;
    }

    /**
     * Returns an array of route instances.
     *
     * @return \Zapheus\Routing\Route[]
     */
    public function routes()
    {
        $this->get('/scream', 'GreetController@scream');

        $this->get('/', 'GreetController@greet');

        // $this->get('/{name}', 'GreetController@greet');

        return $this->routes;
    }
}
