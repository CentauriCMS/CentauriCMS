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
        // Configs
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


        // Routes
        $this->loadRoutesFrom($this->getCentauriDir("Http/CentauriRoutes.php"));


        // Migrations
        $this->loadMigrationsFrom($this->getCentauriDir("Migrations"));

        $this->publishes([
            $this->getCentauriDir("Migrations/") => database_path("migrations")
        ], "migrations");


        /* Views
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
        // Controllers
        // $this->app->make("Centauri\\CMS\\Controller\\BackendController");
        // $this->app->make("Centauri\\CMS\\Controller\\CentauriController");

        // Views
        $this->loadViewsFrom($this->getCentauriDir("Views"), "Centauri");
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
