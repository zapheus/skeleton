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
    /**
     * Registers the bindings in the container.
     *
     * @param  \Zapheus\Container\WritableInterface $container
     * @return \Zapheus\Container\ContainerInterface
     */
    public function register(WritableInterface $container)
    {
        $composite = new CompositeRouter;

        $container->set(get_class($composite), $composite);

        return $container;
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
        $composite = __NAMESPACE__ . '\CompositeRouter';

        $result = $container->get($composite)->merge($router);

        return $container->set($composite, $result);
    }
}
