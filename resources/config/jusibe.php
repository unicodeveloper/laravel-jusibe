<?php

/*
 * This file is part of the Laravel Jusibe package.
 *
 * (c) Prosper Otemuyiwa <prosperotemuyiwa@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

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