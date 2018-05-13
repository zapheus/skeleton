<?php

namespace App\Example;

use Zapheus\Container\WritableInterface;
use Zapheus\Provider\ProviderInterface;

/**
 * Example Provider
 *
 * @package App
 * @author  Rougin Royce Gutib <rougingutib@gmail.com>
 */
class ExampleProvider implements ProviderInterface
{
    /**
     * Registers the bindings in the container.
     *
     * @param  \Zapheus\Container\WritableInterface $container
     * @return \Zapheus\Container\ContainerInterface
     */
    public function register(WritableInterface $container)
    {
        $config = $container->get(ProviderInterface::CONFIG);

        $templates = __DIR__ . DIRECTORY_SEPARATOR . 'Templates';

        $config->set('app.views.sample', $templates);

        $container->set(ProviderInterface::CONFIG, $config);

        $router = new RouteCollection;

        return $container->set(get_class($router), $router);
    }
}
