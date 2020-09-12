<?php
namespace Centauri\CMS\Provider;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class CentauriServiceProvider extends ServiceProvider
{
    /**
     * @param string $dir
     * 
     * @return string
     */
    public function getCentauriDir($dir)
    {
        return __DIR__ . "/../" . $dir;
    }

    /**
     * @param string $dir
     * 
     * @return string
     */
    public function getRootDir($dir)
    {
        return __DIR__ . "/../../" . $dir;
    }

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
            "content_elements",
            "core",
            "cropper",
            "forms",
            "grid_layouts",
            "model_elements",
            "schedulers",
            "server"
        ];

        // Publishes Configs
        foreach($centauriConfigFiles as $config) {
            $this->publishes([
                $this->getRootDir("config/centauri/$config.php") => config_path("centauri/$config.php")
            ], "config");
        }

        // Routes
        $this->loadRoutesFrom($this->getCentauriDir("Http/CentauriRoutes.php"));

        // Migrations
        $this->loadMigrationsFrom($this->getCentauriDir("Migrations"));

        // Publishes Migrations
        $this->publishes([
            $this->getCentauriDir("Migrations/") => database_path("migrations")
        ], "migrations");
    }

    /**
     * Register the application services.
     * 
     * @return void
     */
    public function register()
    {
        // Views
        $this->loadViewsFrom($this->getCentauriDir("Views"), "Centauri");
    }
}
