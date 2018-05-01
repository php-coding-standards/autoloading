# Shake Autoloading
[![PHP from Travis config](https://img.shields.io/travis/php-v/shake-php/autoloading.svg)](https://github.com/shake-php/autoloading)
[![Build Status](https://travis-ci.org/shake-php/autoloading.svg?branch=master)](https://travis-ci.org/shake-php/autoloading)
[![Coveralls github branch](https://img.shields.io/coveralls/github/shake-php/autoloading/master.svg)](https://coveralls.io/github/shake-php/autoloading)
[![Latest Stable Version](https://poser.pugx.org/shake-php/autoloading/v/stable)](https://packagist.org/packages/shake-php/autoloading)
[![License](https://poser.pugx.org/shake-php/autoloading/license)](https://packagist.org/packages/shake-php/autoloading)

The shake autoloader is to make autoloading of classes and files easy.

## Installation

via Shake:
> This method is not avaliable.

via Composer:
```sh
composer require shake-php/autoloading
```

## Autoloaders

> - Psr4 Autoloader
> - Classmap Autoloader
> - Files Autoloader

## Getting Started

First we should include the autoload file.

```php
<?php

// Composer or Shake autoload.
require_once __DIR__ . '/vendor/autoload.php';

// ... //

```

## Psr4 Autoloading

Using the psr4 autoloader is similiar to composers psr4 autoloader. Before using you need to create a configuration for the autoloader. Below is what the configuration array should look like.

```php

$config = array(
    'The monolog.'     => 'The base directory.',
    'Another monolog.' => 'Another base directory.',
    // ... //
);

```

This config should follow the psr4 standards. You can view it [here](https://www.php-fig.org/psr/psr-4/). Below is an example of the configuration array.

```php
<?php
// ... //

$config = array(
    'The monolog.'     => 'The base directory.',
    'Another monolog.' => 'Another base directory.',
    // ... //
);

(new Psr4Autoloading)->register($config);

// If the class `FooBar` has the same monolog as one in the config and exists in the base directory
// assigned to the monolog it will include it.

$foobar = new My\Monolog\FooBar();

```

## Classmap Autoloading

The classmap autoloader is exactly like the classmap autoloader. The configuration setup is just like the psr4 autoloader configuration. The only difference is you only specify the directory in with the autoloader will scan for the requested class. Down below is an example.

```php
// ... //

$config = array(
    'The base directory.',
    'Another base directory.',
    // ... //
);

(new ClassmapAutoloading)->register($config);

// If the class `FooBar` exists in one of the specified directorys it will include the file `FooBar.php` in the
// base directory.

$foobar = new FooBar();
```

## Files Autoloading

The files autoloader will autoload on the first chance it gets. Down below is a basic example. The configuration array is going to be the location of the files. If the file exists then include it.

```php
<?php
// ... //

$config = array(
    'The file location.',
    'Another file location.',
    // ... //
);

(new FilesAutoloader)->register($config);
```

## License

Permissions of this strong copyleft license are conditioned on making available complete source code of licensed works and modifications, which include larger works using a licensed work, under the same license. Copyright and license notices must be preserved. Contributors provide an express grant of patent rights.

## Links

- https://packagist.org/packages/shake-php/autoloading
- Shake webiste does not exist yet.
