<?php

namespace App\Zapheus;

/**
 * Illuminate Provider
 *
 * @package App
 * @author  Rougin Royce Gutib <rougingutib@gmail.com>
 */
class IlluminateProvider extends FrameworkProvider
{
    /**
     * Class name of the bridge provider.
     *
     * @var string
     */
    protected $provider = 'Zapheus\Bridge\Illuminate\Provider';

    /**
     * Configuration path for the providers.
     *
     * @var string
     */
    protected $providers = 'app.providers.laravel';
}
