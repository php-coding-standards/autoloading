# Shake Autoloading
[![PHP from Travis config](https://img.shields.io/travis/php-v/shake-php/autoloading.svg)](https://github.com/shake-php/autoloading)
[![Build Status](https://travis-ci.org/shake-php/autoloading.svg?branch=master)](https://travis-ci.org/shake-php/autoloading)
[![Coveralls github branch](https://img.shields.io/coveralls/github/shake-php/autoloading/master.svg)](https://coveralls.io/github/shake-php/autoloading)
[![Latest Stable Version](https://poser.pugx.org/shake-php/autoloading/v/stable)](https://packagist.org/packages/shake-php/autoloading)
[![License](https://poser.pugx.org/shake-php/autoloading/license)](https://packagist.org/packages/shake-php/autoloading)

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

## Psr4 Autoloading
Using the psr4 autoloader is similiar to composers psr4 autoloader. First we should create the autoloader instance before pushing the configuration.

```php
<?php

// Composer or Shake autoload.
require_once __DIR__ . '/vendor/autoload.php';

// Psr4 autoload instance.
$psr4autoload = new Psr4Autoloading();

// ...

```
After that you need to create a configuration for the autoloader. Below is what the configuration array should look like.
```php

$config = array(
    'The monolog.'    => 'The base directory.',
    'Another monolog' => 'Another base directory.',
    // ... //
);

```

This config should follow the psr4 standards. You can view it [here](https://www.php-fig.org/psr/psr-4/). Below is an example of the configuration array. The examples were taken [here](https://www.php-fig.org/psr/psr-4/#3-examples).

```php
<?php

$config = array(
    'Acme\\Log\\Writer' => './acme-log-writer/lib/',
    'Aura\\Web'         => '/path/to/aura-web/src/',
    'Symfony\\Core'     => './vendor/Symfony/Core/',
    'Zend'              => '/usr/includes/Zend/',
);

(new Psr4Autoloading)->register($config);

$result1 = new Acme\Log\Writer\File_Writer;
$result2 = new Aura\Web\Response\Status;
$result3 = new Symfony\Core\Request;
$result4 = new Zend\Acl;

```

The above is equivalent to.

```php
<?php

include './acme-log-writer/lib/File_Writer.php';
include '/path/to/aura-web/src/Response/Status.php';
include './vendor/Symfony/Core/Request.php';
include '/usr/includes/Zend/Acl.php';

```

With Psr4 it will only include it when you use it.

## Classmap Autoloading
