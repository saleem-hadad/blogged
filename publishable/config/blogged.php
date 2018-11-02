<?php

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

    'routes' => [
        'blog'  => 'blog',
        'admin' => 'blog/admin',
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

    'settings' => [
        'ga_id' => ''
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

    'ui'                 => [
        'show_app_name'  => true,
        'fav'            => '', // e.g.: /fav.png
        'code'           => 'dark',
        'back_to_top'    => true,
        'primary_color'  => '#787AF6',
        'additional_css' => [
            //'css/custom.css',
        ],
        'additional_js'  => [
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
        'pinterest' => false,
        'reddit'    => false,
        'whatsApp'  => false,
        'telegram'  => false,
    ]
];