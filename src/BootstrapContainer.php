<?php

namespace App;

use App\Controllers\GreetController;
use Zapheus\Application;
use Zapheus\Container\Container;
use Zapheus\Provider\Configuration;
use Zapheus\Provider\ConfigurationInterface;

/**
 * Bootstrap Container
 *
 * @package Zapheus
 * @author  Rougin Royce Gutib <rougingutib@gmail.com>
 */
class BootstrapContainer extends Container
{
    /**
     * Initializes the container instance.
     *
     * @param \Zapheus\Container\ContainerInterface|null $delegate
     */
    public function __construct(ContainerInterface $delegate = null)
    {
        // NOTE: If you want to autowire your classes, you may want
        // to use the ReflectionContainer class but it might have an
        // effect regarding the performance of the application. Just
        // uncomment lines 31 and 33 in order to use the instance.

        // $reflection = new ReflectionContainer;

        // $delegate = $delegate === null ? $reflection : $delegate;

        parent::__construct($delegate);

        // Define your dependencies below using $this->set() method.
        // Documentation: Container::set(string $id, mixed $concrete)

        // NOTE: If you enabled the ReflectionContainer above, you can
        // now enable to define controllers without setting it manually.
        // So you can comment line 43 if the said instance was enabled.

        $this->set(GreetController::class, new GreetController);
    }

    /**
     * Loads the configuration files from a specified path.
     *
     * @param  string $path
     * @return self
     */
    public function config($path)
    {
        $interface = ConfigurationInterface::class;

        $config = new Configuration;

        $config->load((string) $path, true);

        return $this->set($interface, $config);
    }

    /**
     * Sets the providers for the application.
     *
     * @param  \Zapheus\Application $application
     * @return \Zapheus\Application
     */
    public function providers(Application $application)
    {
        $config = $this->get(ConfigurationInterface::class);

        $providers = $config->get('app.providers', array());

        foreach ((array) $providers as $provider) {
            $string = is_string($provider);

            $string && $provider = new $provider;

            $application->add($provider);
        }

        return $application;
    }
}
