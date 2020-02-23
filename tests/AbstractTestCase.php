<?php

namespace App;

use App\Zapheus\BootstrapProvider;
use App\Zapheus\SlytherinProvider;
use Zapheus\Http\Message\Request;

/**
 * Abstract Test Case
 *
 * @package Zapheus
 * @author  Rougin Gutib <rougingutib@gmail.com>
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

        $zapheus = new \Zapheus\Application;

        $bootstrap = new BootstrapProvider($root);

        $this->app = $zapheus->add($bootstrap);
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
