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
    'facebook' => [
        'client_id' => '332401677889605',
        'client_secret' => '2dde4aae783ff0b304a79e5a7faa8d31',
         'redirect' => 'https://yalahwy.com/callback/facebook'
    ],'google' => [
        'client_id' => '655939062726-lf5eth9j4d7i3dpuu6m9mj9rf0pd45m4.apps.googleusercontent.com',
        'client_secret' => '6q1_lj_H4joIBbMhuiOpJEoi',
        'redirect' => 'http://yalahwy.com/callback/google',
    ],
];
