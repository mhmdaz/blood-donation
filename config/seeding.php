<?php

return [

    'users' => [
        'super_admin' => [
            'name' => 'Super Admin',
            'email' => env('SUPER_ADMIN_EMAIL', 'dsuperadmin@example.com'),
            'phone' => env('SUPER_ADMIN_PHONE', '01234567890'),
        ],

        'admin' => [
            'name' => 'Admin',
            'email' => env('ADMIN_EMAIL', 'dadmin@example.com'),
            'phone' => env('ADMIN_PHONE', '01234567891'),
        ],
    ],

];
