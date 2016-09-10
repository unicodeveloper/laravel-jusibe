<?php

/*
 * This file is part of the Laravel Jusibe package.
 *
 * (c) Prosper Otemuyiwa <prosperotemuyiwa@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Unicodeveloper\JusibePack;

use Illuminate\Support\ServiceProvider;
use Unicodeveloper\Jusibe\Jusibe;

class JusibeServiceProvider extends ServiceProvider
{

    /*
    * Indicates if loading of the provider is deferred.
    *
    * @var bool
    */
    protected $defer = false;

    /**
    * Publishes all the config file this package needs to function
    */
    public function boot()
    {
        $config = realpath(__DIR__.'/../resources/config/jusibe.php');

        $this->publishes([
            $config => config_path('jusibe.php')
        ]);
    }

    /**
    * Register the application services.
    */
    public function register()
    {
        $this->app->bind('laravel-jusibe', function () {

            return new Jusibe(config('jusibe.publicKey'), config('jusibe.accessToken'));

        });
    }

    /**
    * Get the services provided by the provider
    * @return array
    */
    public function provides()
    {
        return ['laravel-jusibe'];
    }
}