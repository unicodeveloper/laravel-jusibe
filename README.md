# laravel-jusibe

[![Latest Stable Version](https://poser.pugx.org/unicodeveloper/laravel-jusibe/v/stable.svg)](https://packagist.org/packages/unicodeveloper/laravel-jusibe)
[![License](https://poser.pugx.org/unicodeveloper/laravel-jusibe/license.svg)](LICENSE.md)
[![Build Status](https://img.shields.io/travis/unicodeveloper/laravel-jusibe.svg)](https://travis-ci.org/unicodeveloper/laravel-jusibe)
[![Quality Score](https://img.shields.io/scrutinizer/g/unicodeveloper/laravel-jusibe.svg?style=flat-square)](https://scrutinizer-ci.com/g/unicodeveloper/laravel-jusibe)
[![Total Downloads](https://img.shields.io/packagist/dt/unicodeveloper/laravel-jusibe.svg?style=flat-square)](https://packagist.org/packages/unicodeveloper/laravel-jusibe)

> Laravel 5 Wrapper for Jusibe

## Installation

Before you go ahead to install the package, make sure you have [Jusibe PHP library](https://github.com/unicodeveloper/jusibe-php-lib) installed.

[PHP](https://php.net) 7.0+ or [HHVM](http://hhvm.com) 3.3+, and [Composer](https://getcomposer.org) are required
First, pull in the package through Composer.

``` bash
$ composer require unicodeveloper/laravel-jusibe
```

Another alternative is to simply add the following line to the require block of your `composer.json` file.

```
"unicodeveloper/laravel-jusibe": "1.0.*"
```

Then run `composer install` or `composer update` to download it and have the autoloader updated.

Once Laravel Jusibe is installed, you need to register the service provider. Open up `config/app.php` and add the following to the `providers` key.

* `Unicodeveloper\JusibePack\JusibeServiceProvider::class`

Also, register the Facade like so:

```php
'aliases' => [
    ...
    'Jusibe' => Unicodeveloper\JusibePack\Facades\Jusibe::class,
    ...
]
```

## Configuration

You can publish the configuration file using this command:

```bash
php artisan vendor:publish --provider="Unicodeveloper\JusibePack\JusibeServiceProvider"
```

A configuration-file named `jusibe.php` with some sensible defaults will be placed in your `config` directory:

```php
<?php

return [
    /**
     * Public Key From Jusibe Dashboard
     *
     */
    'publicKey' => getenv('JUSIBE_PUBLIC_KEY'),
    /**
     * Access Token From Jusibe  Dashboard
     *
     */
    'accessToken' => getenv('JUSIBE_ACCESS_TOKEN'),
];
```

Get the `publicKey` and `accessToken` from [Jusibe API Keys Section](https://jusibe.com/cp/?section=api-keys)

## Usage

Available methods for use are:
```php

/**
 * Send SMS using the Jusibe API
 * @param  array $payload
 * @return object
 */
Jusibe::sendSMS($payload)->getResponse();

/**
 * Check the available SMS credits left in your Jusibe account
 * @return object
 */
Jusibe::checkAvailableCredits()->getResponse();

/**
 * Check the delivery status of a sent SMS
 * @param  string $messageID
 * @return object
 */
Jusibe::checkDeliveryStatus('8nb1wrgdjw')->getResponse();
```

### Send an SMS

```php

<?php

$message = "I LOVE YOU, BABY";

$payload = [
    'to' => '7079740987',
    'from' => 'PROSPER DATING NETWORK',
    'message' => $message
];

try {
    $response = Jusibe::sendSMS($payload)->getResponse();
    print_r($response);
} catch(Exception $e) {
    echo $e->getMessage();
}

```

### Check SMS Credits

```php

<?php

try {
   $response = Jusibe::checkAvailableCredits()->getResponse();
   print_r($response);
} catch(Exception $e) {
   echo $e->getMessage();
}

```

### Check Delivery Status

```php

<?php

try {
    $response = Jusibe::checkDeliveryStatus('8nb1wrgdjw')->getResponse();
    print_r($response);
} catch(Exception $e) {
    echo $e->getMessage();
}

```

### Send a Bulk SMS

```php

<?php

// include your composer dependencies
require_once 'vendor/autoload.php';

use Unicodeveloper\Jusibe\Jusibe;

$publicKey = 'xxxxxxxxxxxxxx';
$accessToken = 'xxxxxxxxxxxxxx';

$jusibe = new Jusibe($publicKey, $accessToken);

$message = "You are invited for party!!!";

$payload = [
    'to' => '7079740987,8077139164',
    'from' => 'DOZIE GROUP',
    'message' => $message
];

try {
    $response = $jusibe->sendBulkSMS($payload)->getResponse();
    print_r($response);
} catch(Exception $e) {
    echo $e->getMessage();
}

```

**Response Info for Developer**

![Send BulkSMS Response](https://user-images.githubusercontent.com/19904579/46137560-cf37bf00-c241-11e8-9dc6-7096bb0278f4.png)

### Check Bulk Delivery Status

```php

<?php

// include your composer dependencies
require_once 'vendor/autoload.php';

use Unicodeveloper\Jusibe\Jusibe;

$publicKey = 'xxxxxxxxxxxxxx';
$accessToken = 'xxxxxxxxxxxxxx';

$jusibe = new Jusibe($publicKey, $accessToken);

try {
    $response = $jusibe->checkBulkDeliveryStatus('n2v9gby1jy')->getResponse();
    print_r($response);
} catch(Exception $e) {
    echo $e->getMessage();
}

```

**Response Info for Developer**

![Check Bulk Delivery Status Response](https://user-images.githubusercontent.com/19904579/46137669-0a39f280-c242-11e8-9143-8b3ec68ed84f.png)

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

You can run the tests with:

```bash
vendor/bin/phpunit run
```

Alternatively, you can run the tests like so:

```bash
composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Credits

- [Prosper Otemuyiwa](https://twitter.com/unicodeveloper)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Security

If you discover any security related issues, please email [prosperotemuyiwa@gmail.com](prosperotemuyiwa@gmail.com) instead of using the issue tracker.