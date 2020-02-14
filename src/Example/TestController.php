<?php

namespace App\Example;

use Zapheus\Renderer\RendererInterface;

/**
 * Test Controller
 *
 * @package App
 * @author  Rougin Gutib <rougingutib@gmail.com>
 */
class TestController
{
    /**
     * @var \Zapheus\Renderer\RendererInterface
     */
    protected $renderer;

    /**
     * Initializes the HTTP controller instance.
     *
     * @param \Zapheus\Renderer\RendererInterface $renderer
     */
    public function __construct(RendererInterface $renderer)
    {
        $this->renderer = $renderer;
    }

    /**
     * Greets you with a "lorem ipsum" text.
     *
     * @return string
     */
    public function greet()
    {
        return $this->renderer->render('sample.test');
    }
}
