<?php

use BinaryTorch\Blogged\Http\Middleware\Authorize;
use BinaryTorch\Blogged\Http\Middleware\Authenticate;

return [
    /*
    |--------------------------------------------------------------------------
    | Blogged Routes
    |--------------------------------------------------------------------------
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
    */

    'settings'       => [
        'user'       => App\User::class,
        'storage'    => env('BLOGGED_STORAGE', 'local'),
        'ga_id'      => env('BLOGGED_GA', ''),
        'pagination' => 4,
    ],

    /*
    |--------------------------------------------------------------------------
    | Blogged Navbar Links
    |--------------------------------------------------------------------------
    */

    'nav_links'  => [
        [
            'name'       => 'Home',
            'url'        => '/',
            'icon'       => 'planet',
            'icon_pack'  => 'ni', // ni, fa
        ],
        [
            'name'       => 'Blog',
            'url'        => '/blog',
            'icon'       => 'book-bookmark',
            'icon_pack'  => 'ni', // ni, fa
        ],
        [
            'name'       => 'Dashboard',
            'url'        => '/blog/dashboard',
            'icon'       => 'palette',
            'icon_pack'  => 'ni', // ni, fa
        ],
        [
            'name'       => 'Docs',
            'url'        => '/docs',
            'icon'       => 'books',
            'icon_pack'  => 'ni', // ni, fa
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Blogged Footer Links
    |--------------------------------------------------------------------------
    */

    'footer_links'       => [
        [
            'name'       => 'Home',
            'url'        => '/',
        ],
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

    'middleware' => [
        'web',
        Authenticate::class,
        Authorize::class,
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
    */

    'social'        => [
        'twitter'   => true,
        'facebook'  => true,
        'linkedin'  => true,
        'google'    => true,
        'tumblr'    => false,
        'email'     => false,
        'pinterest' => true,
        'reddit'    => false,
        'whatsApp'  => false,
        'telegram'  => false,
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
                'site_name' => '', // {site_name}.disqus.com
            ]
        ]
    ],
];
