<?php

namespace App\Application;

use Zapheus\Container\WritableInterface;
use Zapheus\Provider\ProviderInterface;
use Zapheus\Routing\Dispatcher;
use Zapheus\Routing\DispatcherInterface;

/**
 * Application Provider
 *
 * @package App
 * @author  Rougin Royce Gutib <rougingutib@gmail.com>
 */
class ApplicationProvider implements ProviderInterface
{
    /**
     * Registers the bindings in the container.
     *
     * @param  \Zapheus\Container\WritableInterface $container
     * @return \Zapheus\Container\ContainerInterface
     */
    public function register(WritableInterface $container)
    {
        $dispatcher = new Dispatcher(new RouteCollection);

        $interface = DispatcherInterface::class;

        return $container->set($interface, $dispatcher);
    }
}
