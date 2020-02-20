<?php

namespace App\Zapheus;

/**
 * Silex Provider
 *
 * @package App
 * @author  Rougin Gutib <rougingutib@gmail.com>
 */
class SilexProvider extends FrameworkProvider
{
    /**
     * Class name of the bridge provider.
     *
     * @var string
     */
    protected $provider = 'Zapheus\Bridge\Silex\BridgeProvider';

    /**
     * Configuration path for the providers.
     *
     * @var string
     */
    protected $providers = 'providers.silex';
}
