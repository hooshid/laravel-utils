# Laravel Utils

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Total Downloads][ico-downloads]][link-downloads]

This is a utility package that provides some built in helpers and tools.

## Install

Via Composer

``` bash
$ composer require hooshid/laravel-utils
```

## Setup

Add the service provider to the providers array in `config/app.php`.

``` php
'providers' => [
    Hooshid\Utils\UtilsServiceProvider::class,
];
```

If you are using Laravel's automatic package discovery, you can skip this step.

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/hooshid/laravel-utils.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/hooshid/laravel-utils.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/hooshid/laravel-utils
[link-downloads]: https://packagist.org/packages/hooshid/laravel-utils
