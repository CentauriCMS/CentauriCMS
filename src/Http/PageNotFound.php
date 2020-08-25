<?php
namespace Centauri\Http;

use Exception;

class PageNotFound
{
    public static function handle()
    {
        throw new Exception("The requested page could not be resolved");
    }
}
