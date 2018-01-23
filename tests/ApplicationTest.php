<?php

namespace App;

use App\Application\ApplicationProvider;
use Zapheus\Http\Message\Request;
use Zapheus\Http\Message\Response;
use Zapheus\Http\Message\ResponseInterface;
use Zapheus\Http\MessageProvider;

/**
 * Application Test
 *
 * @package Zapheus
 * @author  Rougin Royce Gutib <rougingutib@gmail.com>
 */
class ApplicationTest extends \PHPUnit_Framework_TestCase
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
        $_SERVER['REQUEST_METHOD'] = 'GET';

        $_SERVER['REQUEST_URI'] = '/';

        $_SERVER['SERVER_NAME'] = 'rougin.github.io';

        $_SERVER['SERVER_PORT'] = 8000;

        $container = new BootstrapContainer;

        $root = str_replace('tests', '', __DIR__);

        $container->config($root . 'app/config');

        $this->app = new \Zapheus\Application($container);

        $this->app->add(new MessageProvider);

        $this->app->add(new ApplicationProvider);
    }

    /**
     * Tests Application::run.
     *
     * @return void
     */
    public function testRunMethod()
    {
        $expected = (string) 'Greetings, Stranger!';

        $result = (string) $this->app->run();

        $this->assertEquals($expected, $result);
    }
}
