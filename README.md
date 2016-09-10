# laravel-jusibe

[![Latest Stable Version](https://poser.pugx.org/unicodeveloper/laravel-jusibe/v/stable.svg)](https://packagist.org/packages/unicodeveloper/laravel-jusibe)
[![License](https://poser.pugx.org/unicodeveloper/laravel-jusibe/license.svg)](LICENSE.md)
[![Quality Score](https://img.shields.io/scrutinizer/g/unicodeveloper/laravel-jusibe.svg?style=flat-square)](https://scrutinizer-ci.com/g/unicodeveloper/laravel-jusibe)
[![Total Downloads](https://img.shields.io/packagist/dt/unicodeveloper/laravel-jusibe.svg?style=flat-square)](https://packagist.org/packages/unicodeveloper/laravel-jusibe)

> Laravel 5 Wrapper for Jusibe

## Installation

[PHP](https://php.net) 5.5+ or [HHVM](http://hhvm.com) 3.3+, and [Composer](https://getcomposer.org) are required
First, pull in the package through Composer.

``` bash
$ composer require unicodeveloper/laravel-jusibe
```

Another alternative is to simply add the following line to the require block of your `composer.json` file.

```
"unicodeveloper/laravel-jusibe": "1.0.*"
```

Then run `composer install` or `composer update` to download it and have the autoloader updated.

Once Laravel-Jusibe is installed, you need to register the service provider. Open up `config/app.php` and add the following to the `providers` key.

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

## Usage

Open your .env file and add your publickey and access-token like so:

```php
JUSIBE_PUBLIC_KEY=xxxxxxxxxxx
JUSIBE_ACCESS_TOKEN=xxxxxxxxxxxxxxxx
```

You can now use the methods in your laravel app using the `Jusibe` Facade like so:

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

**Response Info for Developer**

![SendSMS Response](https://cloud.githubusercontent.com/assets/2946769/14465033/451179c4-00c9-11e6-881e-bcc92665fa7c.png)

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

**Response Info for Developer**

![Check SMS Credits Response](https://cloud.githubusercontent.com/assets/2946769/14465412/d15361f8-00ca-11e6-8145-7cb8cd2b46d0.png)

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

**Response Info for Developer**

![Check Delivery Status Response](https://cloud.githubusercontent.com/assets/2946769/14465686/bb61e3d2-00cb-11e6-9164-ec73665408f3.png)

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## How can I thank you?

Why not star the github repo? I'd love the attention! Why not share the link for this repository on Twitter or HackerNews? Spread the word!

Don't forget to [follow me on twitter](https://twitter.com/unicodeveloper)!

Thanks!
Prosper Otemuyiwa.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Security

If you discover any security related issues, please email [prosperotemuyiwa@gmail.com](prosperotemuyiwa@gmail.com) instead of using the issue tracker.