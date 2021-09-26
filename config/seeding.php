<?php

return [

    'users' => [
        'super-admin' => [
            [
                'name' => 'Super Admin',
                'email' => env('SUPER_ADMIN_EMAIL', 'superadmin@example.com'),
                'phone' => env('SUPER_ADMIN_PHONE', '1234567890'),
            ],
        ],

        'admin' => [
            [
                'name' => 'Admin',
                'email' => env('ADMIN_EMAIL', 'admin@example.com'),
                'phone' => env('ADMIN_PHONE', '1234567891'),
            ],
        ],
    ],

];
