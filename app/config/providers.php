<?php

/**
 * An array of providers to be added to the application.
 *
 * @var array
 */
return array(
    /**
     * Laravel Service Providers
     *
     * @var string[]
     */
    'laravel' => array(),

    /**
     * Silex Service Providers
     *
     * @var \Pimple\ServiceProviderInterface[]
     */
    'silex' => array(),

    /**
     * Symfony Bundles
     *
     * @var \Symfony\Component\HttpKernel\Bundle\BundleInterface[]
     */
    'symfony' => array(),

    /**
     * Zapheus Providers
     *
     * @var string[]
     */
    'zapheus' => array(
        // Standalone Providers
        'Zapheus\Http\MessageProvider',

        // Application Providers
        'App\Example\ExampleProvider',

        // Zapheus Application Providers
        'App\Zapheus\DispatcherProvider',
        'App\Zapheus\IlluminateProvider',
        'App\Zapheus\MappingsProvider',
        'App\Zapheus\SilexProvider',
        'App\Zapheus\SlytherinProvider',
        'App\Zapheus\SymfonyProvider',

        // Configuration-based Providers
        'Zapheus\Renderer\RendererProvider',
    ),
);
