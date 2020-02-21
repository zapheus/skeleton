<?php

namespace App\Zapheus;

/**
 * Slytherin Provider
 *
 * @package App
 * @author  Rougin Gutib <rougingutib@gmail.com>
 */
class SlytherinProvider extends FrameworkProvider
{
    /**
     * Class name of the bridge provider.
     *
     * @var string
     */
    protected $provider = 'Zapheus\Bridge\Slytherin\BridgeProvider';

    /**
     * Configuration path for the providers.
     *
     * @var string
     */
    protected $providers = 'providers.slytherin';
}
