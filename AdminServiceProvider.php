<?php

namespace NineCells\Admin;

use App;
use Illuminate\Support\ServiceProvider;
use NineCells\Assets\AdminLTE\AdminLTEServiceProvider;

class AdminServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if (!$this->app->routesAreCached()) {
            require __DIR__ . '/Http/routes.php';
        }

        $this->loadViewsFrom(__DIR__ . '/resources/views', 'ncells');

        $this->publishes([
            __DIR__ . '/resources/config/ninecells/admin.php' => config_path('ninecells/admin.php'),
        ]);
    }

    public function register()
    {
        App::register(AdminLTEServiceProvider::class);

        $this->app->singleton(AdminManager::class, function ($app) {
            return new AdminManager($app);
        });

        $this->app->singleton(PackageList::class, function ($app) {
            return new PackageList();
        });
    }
}
