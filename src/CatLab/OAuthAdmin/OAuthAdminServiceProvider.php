<?php

namespace CatLab\OAuthAdmin;

use Illuminate\Support\ServiceProvider;

/**
 * Class OAuthAdminServiceProvider
 * @package CatLab\OAuthAdmin
 */
class OAuthAdminServiceProvider extends ServiceProvider
{

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        // TODO: Implement register() method.
    }

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        if (! $this->app->routesAreCached()) {
            require __DIR__.'/../../routes.php';
        }

        $namespace = 'oauth-admin';
        $resourcePath = __DIR__.'/../../../resources/';

        $this->loadViewsFrom($resourcePath . 'views', $namespace);
        $this->loadTranslationsFrom($resourcePath . 'lang', $namespace);

        $this->publishes([
            $resourcePath . 'views' => resource_path('views/vendor/catlab/oauth-admin'),
            $resourcePath . 'lang' => resource_path('lang/vendor/catlab/oauth-admin'),
        ]);
    }
}