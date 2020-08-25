<?php
namespace Centauri\CMS\Provider;

use Illuminate\Support\ServiceProvider;

class CentauriServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     * 
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom($this->getCentauriDir("Migrations"));

        $centauriConfigFiles = [
            "backend_layouts",
            "centauri",
            "config",
            "content_elements",
            "cropper",
            "forms",
            "grid_layouts",
            "model_elements",
            "schedulers",
            "server"
        ];

        foreach($centauriConfigFiles as $ccf) {
            $this->publishes([
                $this->getRootDir("config/centauri/$ccf.php") => config_path("$ccf.php")
            ], "config");
        }

        $this->publishes([
            $this->getCentauriDir("Migrations/") => database_path("migrations")
        ], "migrations");

        /* VIEWS
        $this->publishes([
            __DIR__.'/path/to/views' => resource_path('views/vendor/courier'),
        ]);
        */
    }

    /**
     * Register the application services.
     * 
     * @return void
     */
    public function register()
    {
        $this->app->make("Centauri\\Controller\\BackendController");
        $this->app->make("Centauri\\Controller\\CentauriController");

        $this->loadViewsFrom($this->getCentauriDir("Views"), "Centauri");

        $this->loadRoutesFrom($this->getCentauriDir("Http/CentauriRoutes.php"));
    }

    public function getCentauriDir($dir)
    {
        return __DIR__ . "/../" . $dir;
    }

    public function getRootDir($dir)
    {
        return __DIR__ . "/../../" . $dir;
    }
}
