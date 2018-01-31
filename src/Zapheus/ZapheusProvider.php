<?php

namespace App\Zapheus;

use Zapheus\Container\WritableInterface;
use Zapheus\Provider\ProviderInterface;
use Zapheus\Routing\RouterInterface;

/**
 * Zapheus Provider
 *
 * @package App
 * @author  Rougin Royce Gutib <rougingutib@gmail.com>
 */
class ZapheusProvider implements ProviderInterface
{
    const COMPOSITE = 'App\Zapheus\CompositeRouter';

    /**
     * Registers the bindings in the container.
     *
     * @param  \Zapheus\Container\WritableInterface $container
     * @return \Zapheus\Container\ContainerInterface
     */
    public function register(WritableInterface $container)
    {
        return self::merge($container, new RouteCollection);
    }

    /**
     * Merges two or more Routing\RouterInterface instances.
     *
     * @param  \Zapheus\Container\WritableInterface $container
     * @param  \Zapheus\Routing\RouterInterface     $router
     * @return \Zapheus\Container\WritableInterface
     */
    public static function merge(WritableInterface $container, RouterInterface $router)
    {
        $exists = $container->has(self::COMPOSITE);

        $default = new CompositeRouter;

        $exists || $container->set(self::COMPOSITE, $default);

        $composite = $container->get(self::COMPOSITE);

        $composite->merge($router);

        return $container->set(self::COMPOSITE, $composite);
    }
}
