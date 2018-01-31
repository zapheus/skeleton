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
}
