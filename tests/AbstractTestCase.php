<?php

namespace App;

use Zapheus\Http\Message\Request;

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
        $_SERVER = $this->server('GET', '/');

        $root = str_replace('tests', '', __DIR__);

        $bootstrap = new \App\Bootstrap($root);

        $this->app = $bootstrap->initialize();
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
