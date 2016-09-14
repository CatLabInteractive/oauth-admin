<?php

Route::group(
    [
        'prefix' => 'oauth-admin',
        'namespace' => 'CatLab\\OAuthAdmin\\Controllers',
        'middleware' => [ 'admin' ]
    ],
    function() {

        Route::get('', 'ApplicationController@index');
        Route::get('applications', 'ApplicationController@index');
        Route::get('applications/create', 'ApplicationController@createApplication');
        Route::post('applications/create', 'ApplicationController@processCreate');

        Route::get('applications/{id}', 'ApplicationController@edit');
        Route::post('applications/{id}/endpoints', 'ApplicationController@createEndpoint');
        Route::get('applications/{id}/endpoints/{endpointId}/remove', 'ApplicationController@removeEndpoint');

    }
);