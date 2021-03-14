<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Language Files
    |--------------------------------------------------------------------------
    |
    | Below you reference all language files that should be loaded for the
    | routes in your app. This works using route names so ensure all of your
    | route are named.
    |
    | By default '*' => 'app' - means all language strings will come from the
    | /resources/lang/en/app.php file.
    |
    | You can use wildcard selectors to select multiple routes like so -
    |
    | 'login*' => 'login'
    */

    '*' => 'app',
    //'login*' => 'login',


    /*
    |--------------------------------------------------------------------------
    | Routes to Ignore
    |--------------------------------------------------------------------------
    |
    | By default if the language files are enabled and we cannot find an
    | entry into this file an exception is thrown.  You can specify selected
    | routes to be ignored by this action.
    |
    */

    'ignore-routes' => [
        'livewire.message',
    ],

];
