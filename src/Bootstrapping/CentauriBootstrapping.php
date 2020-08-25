<?php
namespace Centauri\Bootstrapping;

use Centauri\Centauri;

class CentauriBootstrapping
{
    /**
     * Constructor when Centauri is in Bootstrapping-phase.
     * 
     * @return void
     */
    public function __construct()
    {
        $env = app("env");
        Centauri::setApplicationContext($env);
    }
}
