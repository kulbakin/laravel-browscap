<?php

return [
    /*
    |--------------------------------------------------------------------------
    | browscap.ini type
    |--------------------------------------------------------------------------
    |
    | browscap.ini file to download from remote location, possible values are:
    |   Lite_PHP_Bro wscapINI
    |   PHP_BrowscapINI
    |   Full_PHP_BrowscapINI
    |
    */
    'file' => 'PHP_BrowscapINI',

    /*
    |--------------------------------------------------------------------------
    | Cache location
    |--------------------------------------------------------------------------
    |
    | Where the cache files are located
    |
    */
    'cache' => storage_path('framework/cache/browscap'),
];
