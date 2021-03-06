<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */
    'marketplace' => [
        'base_uri' => env('MARKETPLACE_BASE_URI'),
        'client_id' => env('MARKETPLACE_CLIENT_ID'),
        'client_secret' => env('MARKETPLACE_CLIENT_SECRET'),
        'password_client_id' => env('MARKETPLACE_PASSWORD_CLIENT_ID'),
        'password_client_secret' => env('MARKETPLACE_PASSWORD_CLIENT_SECRET'),
    ],

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'market' => [
        'base_uri' => env('MARKET_BASE_URI'),
        'client_id' => env('MARKET_CLIENT_ID'),
        'client_secret' => env('MARKET_CLIENT_SECRET'),
        'password_client_id' => env('MARKET_PASSWORD_CLIENT_ID'),
        'password_client_secret' => env('MARKET_PASSWORD_CLIENT_SECRET'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\Models\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
        'webhook' => [
            'secret' => env('STRIPE_WEBHOOK_SECRET'),
            'tolerance' => env('STRIPE_WEBHOOK_TOLERANCE', 300),
        ],
    ],

];
