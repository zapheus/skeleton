# Application Skeleton

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
$ composer create-project zapheus\skeleton:dev-master "acme"
```

## Getting Started

### Adding dependencies using `ContainerInterface`

**src/BootstrapContainer.php**

``` php
use App\Controllers\TestController;

class BootstrapContainer extends Container
{
    // ...

    public function __construct(ContainerInterface $delegate = null)
    {
        // ...

        $this->set(TestController::class, new TestController);
    }
}
```

### Adding routes using `RouteCollection`

**src/Application/RouteCollection.php**

``` php
class RouteCollection extends Router
{
    // ...

    public function routes()
    {
        // ...

        $this->get('/test', function () {
            return 'This is a sample route';
        });

        // ...
    }
}
```

### Running the application using PHP's built-in web server

``` bash
$ php -S localhost:8000 -t app/web
```

Now open your web browser and go to [http://localhost:8000](http://localhost:8000).

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ vendor/bin/phpunit
```

[ico-version]: https://img.shields.io/packagist/v/zapheus\skeleton.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/zapheus\skeleton/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/zapheus\skeleton.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/zapheus\skeleton.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/zapheus\skeleton.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/zapheus\skeleton
[link-travis]: https://travis-ci.org/zapheus\skeleton
[link-scrutinizer]: https://scrutinizer-ci.com/g/zapheus\skeleton/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/zapheus\skeleton
[link-downloads]: https://packagist.org/packages/zapheus\skeleton
[link-author]: https://github.com/rougin
[link-contributors]: ../../contributors