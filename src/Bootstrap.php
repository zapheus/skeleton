<?php

namespace App;

use Zapheus\Application;
use Zapheus\Container\CompositeContainer;
use Zapheus\Container\Container;
use Zapheus\Container\ReflectionContainer;
use Zapheus\Provider\Configuration;
use Zapheus\Provider\FrameworkProvider;

/**
 * Bootstrap Container
 *
 * @package Zapheus
 * @author  Rougin Royce Gutib <rougingutib@gmail.com>
 */
class Bootstrap extends CompositeContainer
{
    const CONFIG = 'Zapheus\Provider\ConfigurationInterface';

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
     * NOTE: If you want to autowire dependencies of classes, you may need
     * to use the ReflectionContainer instance but it might have an effect
     * regarding the performance of the application. Just uncomment line 72
     * in order to use the mentioned instance.
     *
     * @param string $root
     */
    public function __construct($root)
    {
        $this->root = $root;

        $this->writable = new Container;

        $config = new Configuration;

        $config->load($this->root . $this->config);

        $this->writable->set(self::CONFIG, $config);

        $this->add(new ReflectionContainer);

        $this->definitions();
    }

    /**
     * Prepares the providers and returns the application instance.
     *
     * @return \Zapheus\Application
     */
    public function initialize()
    {
        $application = new Application($this->writable);

        $config = $application->get(self::CONFIG);

        $zapheus = $config->get('app.providers.zapheus');

        foreach ((array) $zapheus as $provider) {
            $string = is_string($provider);

            $string && $provider = new $provider;

            $application->add($provider);
        }

        $application->add(new FrameworkProvider($this));

        return static::$container = $application;
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
     * Define your dependencies using the $this->writable->set() method.
     * See line 72 of Zapheus\Container\Container for documentation.
     *
     * NOTE: If you enabled the ReflectionContainer in line 74, you can
     * now enable to define string classses and instances automatically.
     *
     * @return void
     */
    protected function definitions()
    {
        $greet = 'App\Zapheus\GreetController';

        $this->writable->set($greet, new $greet);

        $test = 'App\Example\TestController';

        $this->writable->set($test, new $test);
    }
}
