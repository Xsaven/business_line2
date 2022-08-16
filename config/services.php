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

    'vimeo' => [
        'client_id' => '252033',
        'secret' => 'BgF2rjhj0GMSjFveg5o5Zso2JKPV/Eh5k+n5GaSB8GyhW1lxRJoW2Cg/zms/Df4Ulbx5gGRkQ4I7ZZlOOYuwxM1uEMOCSy0/rcwUErHn27VUThtv9JwIHEh4UJGgmJ7P',
        'access_tocken' => '91de4ec1fd874ded715ab9db850d3c0b2212d88e',
    ],
];
