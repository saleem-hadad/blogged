<?php

use BinaryTorch\Blogged\Http\Middleware\Authorize;
use BinaryTorch\Blogged\Http\Middleware\Authenticate;

return [
    /*
    |--------------------------------------------------------------------------
    | Blogged Routes
    |--------------------------------------------------------------------------
    |
    | Since Blogged doesn't force you to use custom login page, instead you
    | can use your own login page by providing the login path to be used
    | by Blogged in order to authenticate them and then allows access.
    |
    */

    'routes'        => [
        'blog'      => 'blog',
        'dashboard' => 'blog/dashboard',
        'login'     => 'login',
    ],

    /*
    |--------------------------------------------------------------------------
    | Blogged Settings
    |--------------------------------------------------------------------------
    |
    | Blogged doesn't use any additional `users` table. By default the author
    | of the articles will be pointed to App\User class and the storage to
    | the `local`. Pagination # will relfect how many articles per page.
    |
    */

    'settings'       => [
        'dashboard'  => true,
        'user'       => App\User::class,
        'storage'    => env('BLOGGED_STORAGE', 'local'),
        'ga_id'      => env('BLOGGED_GA', ''),
        'pagination' => 10,
    ],

    /*
    |--------------------------------------------------------------------------
    | Appearance
    |--------------------------------------------------------------------------
    |
    | Here you can add configure the appearance of your blog. For example,
    | you can swap the default logo to custom one that matches your Id
    | Also, you can change the theme of your blog if you prefer that
    |
    | Supported Themes: 'light', 'dark'
    |
    */

    'ui'                   => [
        'show_app_name'    => true,
        'logo'             => '',   // e.g.: /logo.svg
        'fav'              => '',   // e.g.: /fav.png
        'columns'          => 1,    // 2, 3, 4
        'sidebar'          => true,
        'primary_color'    => '#ab3f61',
        'code'             => 'dark',
        'blogged_css'      => true,
        'additional_css'   => [
            //'css/custom.css',
        ],
        'additional_js'    => [
            //'js/custom.js',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Social
    |--------------------------------------------------------------------------
    |
    | Blogged comes with handy little feature enables your readers to
    | share your articles on thier social media accounts. Feel free
    | to enable or disable any of the social media that you want.
    |
    */

    'social'        => [
        'twitter'   => true,
        'facebook'  => true,
        'linkedin'  => true,
        'pinterest' => true,
        'tumblr'    => false,
        'email'     => false,
        'telegram'  => false,
        'whatsapp'  => false,
    ],

    /*
    |--------------------------------------------------------------------------
    | Forum
    |--------------------------------------------------------------------------
    |
    | Giving a chance to your users to post their questions or feedback
    | directly on your blog, is pretty nice way to engage them more.
    | However, you can also enable/disable the forum's visibility.
    |
    | Supported Services: 'disqus'
    |
    */
    'forum'                 => [
        'enabled'           => false,
        'default'           => 'disqus',
        'services'          => [
            'disqus'        => [
                'site_name' => env('BLOGGED_DISQUS_SITE', ''),
            ]
        ]
    ],

    /*
    |--------------------------------------------------------------------------
    | Authentication Guard
    |--------------------------------------------------------------------------
    |
    | This configuration option defines the authentication guard that will
    | be used to protect your Blog routes. This option should match one
    | of the authentication guards defined in the "auth" config file.
    |
    */

    'guard' => env('BLOGGED_GUARD', null),

    /*
    |--------------------------------------------------------------------------
    | Routes Middleware
    |--------------------------------------------------------------------------
    |
    | These middleware will be assigned to every Dashboard route, giving you the
    | chance to add your own middleware to this stack or override any of
    | the existing middleware. Or, you can just stick with this stack.
    |
    */

    // Middlewares assigned to blog front pages
    'middleware-front' => [
        'web',
    ],

    // Middlewares assigned to blog admin
    'middleware-back' => [
        'web',
        Authenticate::class,
        Authorize::class,
    ]
];
