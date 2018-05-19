# Skeleton

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

An application structure for [Zapheus](https://github.com/zapheus/zapheus) framework.

## Install

Via Composer

``` bash
$ composer create-project zapheus/skeleton:dev-master "acme"
```

## Usage

### Running the application

Use PHP's built-in web server (available in v5.4+)

``` bash
$ php -S localhost:8000 -t app/web
```

Now open your web browser and go to [http://localhost:8000](http://localhost:8000).

### Adding Zapheus providers

``` php
// app/config/providers.php

return array(
    // ...

    'zapheus' => array(
        // ...

        // Application Providers
        'App\Acme\AcmeProvider',
        'App\Acme\SampleProvider',

        // ...
    ),
);
```

A Zapheus provider must be implemented in a `ProviderInterface`:

``` php
namespace Zapheus\Provider;

use Zapheus\Container\WritableInterface;

interface ProviderInterface
{
    /**
     * @return \Zapheus\Container\ContainerInterface
     */
    public function register(WritableInterface $container);
}
```

### Adding dependencies to `MappingsProvider`

``` php
// src/Zapheus/MappingsProvider.php

class MappingsProvider implements ProviderInterface
{
    public function register(WritableInterface $container)
    {
        $test = 'App\Acme\DelegatesController';

        return $container->set($test, new $test);
    }
}
```

`MappingsProvider` is only applicable for specified handling of dependencies because Zapheus will try to manage the dependencies based on instances found from the container by default. For complex dependencies, it is recommended to implement it into a `ProviderInterface` instead.

### Adding HTTP routes to `DispatcherProvider`

``` php
// src/Acme/RouteCollection.php

use Zapheus\Routing\Router;

class RouteCollection extends Router
{
    /**
     * Namespace applied to all class-based routes.
     *
     * @var string
     */
    protected $namespace = 'App\Acme';

    /**
     * Returns an array of route instances.
     *
     * @return \Zapheus\Routing\Route[]
     */
    public function routes()
    {
        $this->get('/delegates', 'DelegatesController@index');

        return $this->routes;
    }
}
```

``` php
// src/Zapheus/DispatcherProvider.php

class DispatcherProvider implements ProviderInterface
{
    /**
     * An array of Zapheus\Routing\RouterInterface instances.
     *
     * @var string[]
     */
    protected $routers = array('App\Acme\RouteCollection');
    
    // ..
}
```

### Adding multi-directory template files

``` php
// src/Acme/AcmeProvider.php

use Zapheus\Container\WritableInterface;
use Zapheus\Provider\ProviderInterface;

class AcmeProvider implements ProviderInterface
{
    /**
     * Registers the bindings in the container.
     *
     * @param  \Zapheus\Container\WritableInterface $container
     * @return \Zapheus\Container\ContainerInterface
     */
    public function register(WritableInterface $container)
    {
        // ...

        $templates = __DIR__ . DIRECTORY_SEPARATOR . 'Templates';

        // Add a dot notation after "app.views"
        $config->set('app.views.acme', $templates);
        
        // ...
    }
}
```

``` php
// src/Acme/DelegatesController

class DelegatesController
{
    protected $renderer;

    public function __construct(RendererInterface $renderer)
    {
        $this->renderer = $renderer;
    }
    
    public function index()
    {
        // Use the "acme" prefix defined from AcmeProvider
        return $this->renderer->render('acme.test');
    }
}
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ vendor/bin/phpunit
```

[ico-version]: https://img.shields.io/packagist/v/zapheus/skeleton.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/zapheus/skeleton/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/zapheus/skeleton.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/zapheus/skeleton.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/zapheus/skeleton.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/zapheus/skeleton
[link-travis]: https://travis-ci.org/zapheus/skeleton
[link-scrutinizer]: https://scrutinizer-ci.com/g/zapheus/skeleton/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/zapheus/skeleton
[link-downloads]: https://packagist.org/packages/zapheus/skeleton
[link-author]: https://github.com/rougin
[link-contributors]: ../../contributors