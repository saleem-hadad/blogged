<?php

use BinaryTorch\Blogged\Http\Middleware\Authorize;
use BinaryTorch\Blogged\Http\Middleware\Authenticate;

return [
    /*
    |--------------------------------------------------------------------------
    | Blogged Routes
    |--------------------------------------------------------------------------
    |
    | These options configure the behavior of the LaRecipe docs basic route
    | where you can specify the url of your documentations, the location
    | of your docs and the landing page when a user visits /docs route.
    |
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
    | These options configure the additional behaviors of your documentation
    | where you can limit the access to only authenticated users in your
    | system. It is false initially so that guests can view your docs.
    |
    | You may also specify links to show under the auth dropdown menu.
    | Logout link will show by default.
    |
    |
    */

    'settings'       => [
        'ga_id'      => '',
        'pagination' => 10,
        'columns'    => 2, // 2, 3, 4
    ],

    /*
    |--------------------------------------------------------------------------
    | Blogged Settings
    |--------------------------------------------------------------------------
    |
    | These options configure the additional behaviors of your documentation
    | where you can limit the access to only authenticated users in your
    | system. It is false initially so that guests can view your docs.
    |
    | You may also specify links to show under the auth dropdown menu.
    | Logout link will show by default.
    |
    |
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
    ],

    /*
    |--------------------------------------------------------------------------
    | Blogged Settings
    |--------------------------------------------------------------------------
    |
    | These options configure the additional behaviors of your documentation
    | where you can limit the access to only authenticated users in your
    | system. It is false initially so that guests can view your docs.
    |
    | You may also specify links to show under the auth dropdown menu.
    | Logout link will show by default.
    |
    |
    */

    'footer_links'       => [
        [
            'name'       => 'Home',
            'url'        => '/',
        ],
        [
            'name'       => 'Privacy',
            'url'        => '/privacy',
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
    | Here you can add configure the appearance of your docs. For example,
    | you can swap the default logo to custom one that matches your Id
    | Also, you can change the theme of your docs if you prefer that
    |
    | Supported Themes: 'light', 'dark'
    |
    */

    'ui'                   => [
        'show_app_name'    => true,
        'show_author_name' => true,
        'fav'              => '', // e.g.: /fav.png
        'code'             => 'dark',
        'back_to_top'      => true,
        'primary_color'    => '#ab3f61',
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
    | Giving a chance to your users to post their questions or feedback
    | directly on your docs, is pretty nice way to engage them more.
    | However, you can also enable/disable the forum's visibility.
    |
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