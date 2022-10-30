<?php

return [
    [
        'icon' => 'dashboard',
        'title' => 'Dashboard',
        'permission' => '',
        'route' => 'index',
    ],
    [
        'title' => 'Users Management',
        'permission' => '',
        'children' => [
            [
                'icon' => 'group',
                'title' => 'Users',
                'permission' => '',
                'route' => 'users.index',
            ]
        ]
    ]
];
