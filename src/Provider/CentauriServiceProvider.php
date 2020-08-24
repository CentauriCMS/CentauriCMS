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

        $this->publishes([
            $this->getCentauriDir("config/package.php") => config_path("package.php")
        ], "config");

        $this->publishes([
            $this->getCentauriDir("database/migrations/") => database_path("migrations")
        ], "migrations");

        /* VIEWS
        $this->publishes([
            __DIR__.'/path/to/views' => resource_path('views/vendor/courier'),
        ]);
        */

        var_dump("BOOT YA KSMK");
    }

    /**
     * Register the application services.
     * 
     * @return void
     */
    public function register()
    {
        $this->app->make("Centauri\\CMS\\Controller\\BackendController");
        $this->app->make("Centauri\\CMS\\Controller\\CentauriController");

        $this->loadViewsFrom($this->getCentauriDir("Views"), "Centauri");

        var_dump("REGISTER YA KSMK");
    }

    public function getCentauriDir($dir)
    {
        return __DIR__ . "/../" . $dir;
    }
}
