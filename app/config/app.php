<?php

/**
 * Configurations for your application.
 *
 * @var array
 */
return [
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
     * An array of providers to be added to the application.
     *
     * @var string[]
     */
    'providers' => [
        // Zapheus Providers
        Zapheus\Http\MessageProvider::class,

        // Application Providers
        App\Application\ApplicationProvider::class,
    ],
];
