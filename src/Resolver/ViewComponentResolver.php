<?php
namespace Centauri\CMS\Resolver;

class ViewComponentResolver
{
    /**
     * Registers (more likely adds) the given class-instances $instances to the $GLOBALS-Centauri array.
     * This will be used during runtime to register it properly into Laravel's ViewComponents via Provider (loadViewComponentsAs(...)),
     * with the given $prefix.
     * 
     * @param string $prefix
     * @param array $instances
     * 
     * @return void
     */
    public static function register(string $prefix, array $instances)
    {
        
    }
}
