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
        'client_id' => '227900',
        'secret' => 'AGzoyqxiTtIfVMfq5vZaD/g4DKc+mo8p/473l1YY0sIflH8rgkYzBJ1c1V6XfDrRsxZyhFfJeoEez2ytzL/U2PLUus6tN6VT5ObuFKBBCnV6ppUxmzHdH+EjaLdtpKA0',
        'access_tocken' => '38d413804d650363c2b9d821f74b0063',
    ],
];
