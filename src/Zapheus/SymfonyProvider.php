<?php

namespace App\Zapheus;

/**
 * Symfony Provider
 *
 * @package App
 * @author  Rougin Gutib <rougingutib@gmail.com>
 */
class SymfonyProvider extends FrameworkProvider
{
    /**
     * Class name of the bridge provider.
     *
     * @var string
     */
    protected $provider = 'Zapheus\Bridge\Symfony\BridgeProvider';

    /**
     * Configuration path for the providers.
     *
     * @var string
     */
    protected $providers = 'providers.symfony';
}
