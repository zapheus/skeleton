<?php

namespace App\Zapheus;

use Zapheus\Bridge\Illuminate\Provider;
use Zapheus\Container\WritableInterface;
use Zapheus\Provider\ProviderInterface;

/**
 * Framework Provider
 *
 * @package App
 * @author  Rougin Royce Gutib <rougingutib@gmail.com>
 */
class FrameworkProvider implements ProviderInterface
{
    /**
     * Class name of the bridge provider.
     *
     * @var string
     */
    protected $provider = '';

    /**
     * Configuration path for the providers.
     *
     * @var string
     */
    protected $providers = '';

    /**
     * Registers the bindings in the container.
     *
     * @param  \Zapheus\Container\WritableInterface $container
     * @return \Zapheus\Container\ContainerInterface
     */
    public function register(WritableInterface $container)
    {
        $config = $container->get(ProviderInterface::CONFIG);

        if (class_exists($this->provider) === true) {
            $providers = $config->get($this->providers);

            $provider = new $this->provider($providers);

            $container = $provider->register($container);
        }

        return $container;
    }
}
