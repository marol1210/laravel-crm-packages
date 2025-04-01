<?php

namespace Webkul\Localization\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Event;

class LocalizationServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');

        $this->loadRoutesFrom(__DIR__ . '/../Routes/web.php');

        $this->loadTranslationsFrom(__DIR__ . '/../Resources/lang', 'localization');

        $this->loadViewsFrom(__DIR__ . '/../Resources/views', 'localization');

        // Event::listen('admin.layout.head.after', function($viewRenderEventManager) {
        //     $viewRenderEventManager->addTemplate('internationel::components.layouts.style');
        // });
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerConfig();

        $this->publishes([
            __DIR__.'/../Resources/lang' => $this->app->langPath('vendor/admin'),
        ]);
    }

    /**
     * Register package config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        // $this->mergeConfigFrom(
        //     dirname(__DIR__) . '/Config/menu.php', 'menu.admin'
        // );

        $this->mergeConfigFrom(
            dirname(__DIR__) . '/Config/acl.php', 'acl'
        );
    }
}
