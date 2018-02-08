<?php

Route::group(
    Config::get('oauthadmin.routes', [
        'prefix' => 'oauth-admin',
        'middleware' => [ 'admin' ]
    ]),
    function() {

        $controller = Config::get('oauthadmin.controllers.applications', \CatLab\OAuthAdmin\Controllers\ApplicationController::class );

        Route::get('', $controller . '@index');

        Route::get('applications', $controller . '@index')
            ->name('oauthadmin-applications-index');

        Route::get('applications/create', $controller . '@createApplication')
            ->name('oauthadmin-applications-create');

        Route::post('applications/create', $controller . '@processCreate');

        Route::get('applications/{id}', $controller . '@edit')
            ->name('oauthadmin-applications-edit');

        Route::post('applications/{id}', $controller . '@processEdit');

        Route::post('applications/{id}/endpoints', $controller . '@createEndpoint')
            ->name('oauthadmin-applications-create-endpoint');

        Route::get('applications/{id}/endpoints/{endpointId}/remove',  $controller . '@removeEndpoint')
            ->name('oauthadmin-applications-remove');

    }
);