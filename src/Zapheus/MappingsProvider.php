<?php

namespace App\Zapheus;

use Zapheus\Container\WritableInterface;
use Zapheus\Provider\ProviderInterface;

/**
 * Mappings Provider
 *
 * @package App
 * @author  Rougin Gutib <rougingutib@gmail.com>
 */
class MappingsProvider implements ProviderInterface
{
    /**
     * Registers the bindings in the container.
     *
     * @param  \Zapheus\Container\WritableInterface $container
     * @return \Zapheus\Container\ContainerInterface
     */
    public function register(WritableInterface $container)
    {
        // Define dependencies below using the $container->set() method.
        // Check line 67 of Zapheus\Container\Container for the snippet.

        return $container;
    }
}
