<?php

namespace App\Zapheus;

/**
 * Illuminate Provider
 *
 * @package App
 * @author  Rougin Gutib <rougingutib@gmail.com>
 */
class IlluminateProvider extends FrameworkProvider
{
    /**
     * Class name of the bridge provider.
     *
     * @var string
     */
    protected $provider = 'Zapheus\Bridge\Illuminate\BridgeProvider';

    /**
     * Configuration path for the providers.
     *
     * @var string
     */
    protected $providers = 'providers.laravel';
}
