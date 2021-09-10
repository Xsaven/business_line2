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
        'client_id' => '224995',
        'secret' => 'BE2mT/DRv5jmq1Di7+QRiOhFK5YixTpW4yMAxcJWM6bXnkiho/9AHfxPjKPIe2nznUN7zatlC3mqlUPVQWRBUd6FuozOsnZLHT36uA439VoCW7m7EMfwuFxkV8xId1VD',
        'access_tocken' => '82f815f0907e742bea4e4bba0350f8cf',
    ],
];
