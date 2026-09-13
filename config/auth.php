<?php

return [


    'defaults' => [
        'guard' => 'web',
        'passwords' => 'users',
    ],


    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],

        'api' => [
            'driver' => 'token',
            'provider' => 'users',
            'hash' => false,
        ],
        'client' => [
            'driver' => 'session',
            'provider' => 'clients',
            'hash' => false,
        ],
        'delivery' => [
            'driver' => 'session',
            'provider' => 'deliveries',
            'hash' => false,
        ],
    ],


    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],
        'clients' => [
            'driver' => 'eloquent',
            'model' => App\Entities\Admin\Client::class,
        ],
        // 'deliveries' => [
        //     'driver' => 'eloquent',
        //     'model' => App\Entities\Admin\Delivery::class,
        // ],

        // 'users' => [
        //     'driver' => 'database',
        //     'table' => 'users',
        // ],
    ],



    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],
      
        'clients' => [
            'provider' => 'clients',
            'table' => 'clients',
            'expire' => 60,
            'throttle' => 60,
        ],
    

    ],



    'redirects' => [
        'client' => '/login',
    ],

    'password_timeout' => 10800,

];
