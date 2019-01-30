<?php

return [
    'role_structure' => [
        'superadministrator' => [
            'users' => 'c,r,u,d',
            'posts' => 'c,r,u,d',
            'categories' => 'c,r,u,d',
            'roles' => 'c,r,u,d',
            'permissions' => 'c,r,u,d',
            'profile' => 'r,u'
        ],
        'administrator' => [
            'users' => 'c,r,u,d',
            'posts' => 'c,r,u,d',
            'categories' => 'c,r,u,d',
            'roles' => 'c,r,u,d',
            'permissions' => 'c,r,u,d',
            'profile' => 'r,u'
        ],
        'editor' => [
            'posts' => 'r,u,d',
            'categories' => 'r,u,d',
            'profile' => 'r,u'
        ],
        'author' => [
            'posts' => 'c,r,u',
            'categories' => 'c,r,u',
            'profile' => 'r,u',
        ],
        'contributor' => [
            'posts' => 'r,u',
            'categories' => 'r,u',
            'profile' => 'r,u'
        ],
        'subscriber' => [
            'profile' => 'r,u'
        ],
        'freelancer' => [
            'profile' => 'r,u'
        ],
        'customer' => [
            'profile' => 'r,u'
        ],
    ],
    'permission_structure' => [],
    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
