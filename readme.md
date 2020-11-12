# PHP Container

![Tests](https://github.com/kusabi/container/workflows/tests/badge.svg)
[![codecov](https://codecov.io/gh/kusabi/container/branch/main/graph/badge.svg)](https://codecov.io/gh/kusabi/container)
[![Licence Badge](https://img.shields.io/github/license/kusabi/container.svg)](https://img.shields.io/github/license/kusabi/container.svg)
[![Release Badge](https://img.shields.io/github/release/kusabi/container.svg)](https://img.shields.io/github/release/kusabi/container.svg)
[![Tag Badge](https://img.shields.io/github/tag/kusabi/container.svg)](https://img.shields.io/github/tag/kusabi/container.svg)
[![Issues Badge](https://img.shields.io/github/issues/kusabi/container.svg)](https://img.shields.io/github/issues/kusabi/container.svg)
[![Code Size](https://img.shields.io/github/languages/code-size/kusabi/container.svg?label=size)](https://img.shields.io/github/languages/code-size/kusabi/container.svg)

<sup>An implementation of a [PSR-11](https://www.php-fig.org/psr/psr-11/) conforming Container library</sup>

## Compatibility and dependencies

This library is compatible with PHP version `7.0`, `7.1`, `7.2`, `7.3`, `7.4`, `8.0` and `8.1`.

This library has no dependencies.

## Installation

Installation is simple using composer.

```bash
composer require kusabi/container
```

Or simply add it to your `composer.json` file

```json
{
    "require": {
        "kusabi/container": "^1.0"
    }
}
```

## Using the Container class

The Uri class is a very basic wrapper around a Uri string.


```php
use Kusabi\Container\Container;

// Create a new instance
$container = new Container();

// Set and get items
$container->set('integer', 1);
$container->get('integer'); // 1

// Set values by reference
$array = [1, 2, 3];
$container->setReference('array', $array);
$array[] = 4;
$container->get('array'); // [1, 2, 3, 4]

```
