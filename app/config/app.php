<?php

/**
 * Configurations for your application.
 *
 * @var array
 */
return array(
    /**
     * Name of the application.
     *
     * @var string
     */
    'name' => getenv('APP_NAME'),

    /**
     * Version number of the application, if applicable.
     *
     * @var string
     */
    'version' => getenv('APP_VERSION'),

    /**
     * The URL of your application root.
     *
     * @var string
     */
    'base_url' => getenv('APP_URL'),

    /**
     * Environment used in the application.
     * It's either "development" or "production".
     *
     * @var string
     */
    'environment' => getenv('APP_ENVIRONMENT'),

    /**
     * The default timezone for the application.
     *
     * @var string
     */
    'timezone' => getenv('APP_TIMEZONE'),

    /**
     * The directory name which contains the template files.
     *
     * @var string
     */
    'views' => array(__DIR__ . '/../views'),

    /**
     * An array of providers to be added to the application.
     *
     * @var string[]
     */
    'providers' => array(
        /**
         * Zapheus Providers
         *
         * @var string[]
         */
        'zapheus' => array(
            // Standalone Providers
            'Zapheus\Http\MessageProvider',

            // Application Providers
            'App\Zapheus\ZapheusProvider',
            'App\Example\ExampleProvider',
            'App\Zapheus\DispatcherProvider',

            // Providers that requires configuration
            'Zapheus\Renderer\RendererProvider',
        ),

        /**
         * Laravel Service Providers
         *
         * @var string[]
         */
        'laravel' => array(),
    ),
);
