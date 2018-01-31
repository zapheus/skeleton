<?php

namespace App;

/**
 * Test Controller Test
 *
 * @package Zapheus
 * @author  Rougin Royce Gutib <rougingutib@gmail.com>
 */
class TestControllerTest extends AbstractTestCase
{
    /**
     * Tests TestController::greet.
     *
     * @return void
     *
     * @runInSeparateProcess
     */
    public function testGreetMethod()
    {
        $expected = 'Lorem ipsum dolor sit amet.';

        $response = $this->request('GET', '/test');

        $result = (string) $response->stream();

        $this->assertEquals($expected, $result);
    }
}
