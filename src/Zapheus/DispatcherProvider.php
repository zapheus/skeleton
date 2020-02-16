<?php

namespace App\Zapheus;

use Zapheus\Container\WritableInterface;
use Zapheus\Provider\ProviderInterface;
use Zapheus\Routing\Dispatcher;
use Zapheus\Routing\Router;
use Zapheus\Routing\DispatcherInterface;

/**
 * Dispatcher Provider
 *
 * @package App
 * @author  Rougin Gutib <rougingutib@gmail.com>
 */
class DispatcherProvider implements ProviderInterface
{
    const DISPATCHER = 'Zapheus\Routing\DispatcherInterface';

    /**
     * An array of Zapheus\Routing\RouterInterface instances.
     *
     * @var string[]
     */
    protected $routers = array('App\Example\RouteCollection');

    /**
     * Registers the bindings in the container.
     *
     * @param  \Zapheus\Container\WritableInterface $container
     * @return \Zapheus\Container\ContainerInterface
     */
    public function register(WritableInterface $container)
    {
        $routes = array();

        foreach ((array) $this->routers as $router)
        {
            $item = $container->get((string) $router);

            $current = (array) $item->routes();

            $routes = array_merge($routes, $current);
        }

        $router = new Router((array) $routes);

        $dispatcher = new Dispatcher($router);

        return $container->set(self::DISPATCHER, $dispatcher);
    }
}
