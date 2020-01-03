<?php

return [

    /*
    |--------------------------------------------------------------------------
    | RabbitEvents Connection Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may define the RabbitMQ connection settings that should be used
    | by RabbitEvents. Note that `vhost` should be created by you manually.
    | @see https://www.rabbitmq.com/vhosts.html for more info
    |
    */

    [
        'default' => env('RABBITEVENTS_CONNECTION', 'rabbitmq'),
        'connections' => [
            'rabbitmq' => [
                'driver' => 'rabbitmq',
                'exchange' => env('RABBITEVENTS_EXCHANGE', 'events'),
                'host' => env('RABBITEVENTS_HOST', 'localhost'),
                'port' => env('RABBITEVENTS_PORT', 5672),
                'user' => env('RABBITEVENTS_USER', 'guest'),
                'pass' => env('RABBITEVENTS_PASSWORD', 'guest'),
                'vhost' => env('RABBITEVENTS_VHOST', 'events'),
                'logging' => [
                    'enabled' => env('RABBITEVENTS_LOG_ENABLED', false),
                    'level' => env('RABBITEVENTS_LOG_LEVEL', 'info'),
                ],
            ],
        ],
    ],
];
