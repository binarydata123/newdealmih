<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'google' => [
        'client_id' => '1061817780720-k0shc5jbmm17qe450e49a02sp6c806g9.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'https://dealmih.com/google/callback',

    ],

    'facebook' => [
        'client_id' => '1484693818649409',
        'client_secret' => '98cfcf8910ebf76f124f05fda3d492cd',
        'redirect' => 'https://dealmih.com/facebook/callback',
    ],

    'sign-in-with-apple' => [
        'client_id' => '1484693818649409',
        'client_secret' => '98cfcf8910ebf76f124f05fda3d492cd',
        'redirect' => 'https://dealmih.com/appleid/callback',
    ],

    /*'google' => [
        'client_id' => '1061817780720-k0shc5jbmm17qe450e49a02sp6c806g9.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'https://dealmih.com/google/callback',

    ],

    'facebook' => [
        'client_id' => '433154538304651',
        'client_secret' => '30566ff5e8dcf6aea3d33725001f1635',
        'redirect' => 'https://dealmih.com/facebook/callback',
    ],*/

];
