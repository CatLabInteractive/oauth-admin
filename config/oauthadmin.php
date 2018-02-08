<?php

return [
    'routes' => [
        'prefix' => 'oauth-admin',
        'middleware' => [ 'admin' ]
    ],

    'controllers' => [
        'applications' => \CatLab\OAuthAdmin\Controllers\ApplicationController::class
    ]
];