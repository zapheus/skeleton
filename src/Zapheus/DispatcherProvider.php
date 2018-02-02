<?php

namespace App\Zapheus;

use Zapheus\Container\WritableInterface;
use Zapheus\Provider\ProviderInterface;
use Zapheus\Routing\Dispatcher;
use Zapheus\Routing\DispatcherInterface;

/**
 * Dispatcher Provider
 *
 * @package App
 * @author  Rougin Royce Gutib <rougingutib@gmail.com>
 */
class DispatcherProvider implements ProviderInterface
{
    const DISPATCHER = 'Zapheus\Routing\DispatcherInterface';

    /**
     * Registers the bindings in the container.
     *
     * @param  \Zapheus\Container\WritableInterface $container
     * @return \Zapheus\Container\ContainerInterface
     */
    public function register(WritableInterface $container)
    {
        $composite = __NAMESPACE__ . '\CompositeRouter';

        $composite = $container->get($composite);

        $dispatcher = new Dispatcher($composite);

        $container->set(self::DISPATCHER, $dispatcher);

        return $container;
    }
}
