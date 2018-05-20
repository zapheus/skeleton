<?php

namespace App\Zapheus;

use Zapheus\Container\WritableInterface;
use Zapheus\Provider\Configuration;
use Zapheus\Provider\ProviderInterface;

/**
 * Bootstrap Provider
 *
 * @package App
 * @author  Rougin Royce Gutib <rougingutib@gmail.com>
 */
class BootstrapProvider implements ProviderInterface
{
    /**
     * Full path for the configuration directory.
     *
     * @var string
     */
    protected $config;

    /**
     * An array of loaded providers.
     *
     * @var string[]
     */
    protected $providers = array();

    /**
     * Initializes the provider instance.
     *
     * @param string $root
     * @param string $config
     */
    public function __construct($root, $config = 'app/config')
    {
        $dotenv = new \Dotenv\Dotenv($root);

        $dotenv->load();

        $this->config = $root . $config;
    }

    /**
     * Registers the bindings in the container.
     *
     * @param  \Zapheus\Container\WritableInterface $container
     * @return \Zapheus\Container\ContainerInterface
     */
    public function register(WritableInterface $container)
    {
        $config = new Configuration(array());

        $config->load((string) $this->config);

        $providers = $config->get('providers.zapheus');

        foreach ((array) $providers as $provider) {
            $string = is_string($provider) === true;

            $string === true && $provider = new $provider;

            $container = $provider->register($container);

            $this->providers[] = get_class($provider);
        }

        return $container;
    }
}
