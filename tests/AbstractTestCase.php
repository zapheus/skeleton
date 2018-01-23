<?php

namespace App;

use App\Application\ApplicationProvider;
use Zapheus\Http\Message\Request;
use Zapheus\Http\MessageProvider;

/**
 * Abstract Test Case
 *
 * @package Zapheus
 * @author  Rougin Royce Gutib <rougingutib@gmail.com>
 */
abstract class AbstractTestCase extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \Zapheus\Application
     */
    protected $app;

    /**
     * Sets up the application instance.
     *
     * @return void
     */
    public function setUp()
    {
        $root = str_replace('tests', '', __DIR__);

        $container = new BootstrapContainer;

        $_SERVER = $this->server('GET', '/');

        $container->config($root . 'app/config');

        $app = new \Zapheus\Application($container);

        $this->app = $container->providers($app);
    }

    /**
     * Creates a new request instance.
     *
     * @param  string $method
     * @param  string $uri
     * @return \Zapheus\Http\ResponseInterface
     */
    protected function request($method, $uri)
    {
        $server = $this->server($method, $uri);

        $request = new Request($server, array());

        return $this->app->handle($request);
    }

    /**
     * Returns an array for $_SERVER variables.
     *
     * @param  string $method
     * @param  string $uri
     * @return string[]
     */
    protected function server($method, $uri)
    {
        $server = array('SERVER_PORT' => 8000);

        $server['REQUEST_METHOD'] = $method;

        $server['REQUEST_URI'] = $uri;

        $server['SERVER_NAME'] = 'rougin.github.io';

        return $server;
    }
}
