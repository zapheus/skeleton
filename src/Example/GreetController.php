<?php

namespace App\Example;

use Zapheus\Renderer\RendererInterface;

/**
 * Greet Controller
 *
 * @package App
 * @author  Rougin Gutib <rougingutib@gmail.com>
 */
class GreetController
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
     * Greets a specified name.
     *
     * @return string
     */
    public function greet($name = 'Stranger')
    {
        return $this->renderer->render('sample.greet', compact('name'));
    }

    /**
     * Shouts the specified name.
     *
     * @return string
     */
    public function scream()
    {
        return strtoupper($this->greet());
    }
}
