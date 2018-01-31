<?php

namespace App;

// use Illuminate\Container\Container as IlluminateContainer;
// use Illuminate\Support\Facades\Facade;
use Zapheus\Application;
use Zapheus\Bridge\Illuminate\Provider as IlluminateProvider;
use Zapheus\Container\CompositeContainer;
use Zapheus\Container\Container as WritableContainer;
use Zapheus\Container\ReflectionContainer;
use Zapheus\Provider\Configuration;
use Zapheus\Provider\FrameworkProvider;

// use App\Application\Controllers\GreetController;

/**
 * Bootstrap Container
 *
 * @package Zapheus
 * @author  Rougin Royce Gutib <rougingutib@gmail.com>
 */
class Bootstrap extends CompositeContainer
{
    const ILLUMINATE_CONTAINER = 'Illuminate\Container\Container';

    const ILLUMINATE_PROVIDER = 'Zapheus\Bridge\Illuminate\Provider';

    /**
     * Static instance of the application container.
     *
     * @var \Zapheus\Container\ContainerInterface
     */
    protected static $container;

    /**
     * Path of the configurations directory.
     *
     * @var string
     */
    protected $config = 'app/config';

    /**
     * Full path of the root directory.
     *
     * @var string
     */
    protected $root;

    /**
     * An instance of a Container\WritableInterface.
     *
     * @var \Zapheus\Container\WritableInterface
     */
    protected $writable;

    /**
     * Initializes the container instance.
     *
     * @param string $root
     */
    public function __construct($root)
    {
        $this->root = $root;

        $this->writable = new WritableContainer;

        $this->configuration();

        // NOTE: If you want to autowire your classes, you may want
        // to use the ReflectionContainer class but it might have an
        // effect regarding the performance of the application. Just
        // uncomment lines 75 in order to use the mentioned instance.

        $this->add(new ReflectionContainer);

        // Define your dependencies below using $this->writable->set() method.
        // Documentation: $this->writable->set(string $id, mixed $concrete)

        // NOTE: If you enabled the ReflectionContainer above, you can
        // now enable to define controllers without setting it manually.
        // So you can comment line 84 if the said instance was enabled.

        // $this->writable->set(GreetController::class, new GreetController);
    }

    /**
     * Returns the writable container.
     *
     * @return \Zapheus\Container\WritableInterface
     */
    public function container()
    {
        return $this->writable;
    }

    /**
     * Prepares the providers and runs the application.
     *
     * @return \Zapheus\Application\ApplicationInterface
     */
    public function initialize()
    {
        // Loads the writable container.
        $container = $this->container();

        // Sets up the application with the container
        $app = new Application($container);

        // Loads all the available providers
        return $this->providers($app);
    }

    /**
     * Finds an entry of the container by its identifier and returns it.
     *
     * @param  string $id
     * @return mixed
     *
     * @throws \Zapheus\Container\Exception\NotFoundException
     * @throws \Zapheus\Container\Exception\ContainerException
     */
    public static function make($id)
    {
        return self::$container->get($id);
    }

    /**
     * Loads the configuration files from a specified path.
     *
     * @return \Zapheus\Container\WritableInterface
     */
    protected function configuration()
    {
        $interface = (string) FrameworkProvider::CONFIG;

        $config = new Configuration;

        $config->load($this->root . $this->config);

        return $this->writable->set($interface, $config);
    }

    /**
     * Sets the providers for the application.
     *
     * @param  \Zapheus\Application $application
     * @return \Zapheus\Application
     */
    protected function providers(Application $application)
    {
        $config = $application->get(Application::CONFIGURATION);

        $zapheus = $config->get('app.providers.zapheus');

        foreach ((array) $zapheus as $provider) {
            $string = is_string($provider);

            $string && $provider = new $provider;

            $application->add($provider);
        }

        // if (class_exists(self::ILLUMINATE_PROVIDER) === true) {
        //     $laravel = $config->get('app.providers.laravel', array());

        //     $application->add(new IlluminateProvider($laravel));

        //     $container = $application->get(self::ILLUMINATE_CONTAINER);

        //     Facade::setFacadeApplication($container);
        // }

        $application->add(new FrameworkProvider($this));

        return static::$container = $application;
    }
}
