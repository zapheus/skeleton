<?php

namespace App;

/**
 * Greet Controller Test
 *
 * @package Zapheus
 * @author  Rougin Gutib <rougingutib@gmail.com>
 */
class GreetControllerTest extends AbstractTestCase
{
    /**
     * Tests GreetController::greet.
     *
     * @return void
     *
     * @runInSeparateProcess
     */
    public function testGreetMethod()
    {
        $expected = (string) 'Greetings, Stranger!';

        $response = $this->request('GET', '/');

        $result = (string) $response->stream();

        $this->assertEquals($expected, $result);
    }

    /**
     * Tests GreetController::scream.
     *
     * @return void
     *
     * @runInSeparateProcess
     */
    public function testScreamMethod()
    {
        $expected = (string) 'GREETINGS, STRANGER!';

        $response = $this->request('GET', '/scream');

        $result = (string) $response->stream();

        $this->assertEquals($expected, $result);
    }
}
