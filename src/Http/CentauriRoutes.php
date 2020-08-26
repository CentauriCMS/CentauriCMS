<?php

use Illuminate\Routing\Route;
use Centauri\CMS\Centauri;
use Centauri\CMS\Http\Request;
use Centauri\CMS\Component\ExtensionsComponent;

/** Centauri Core-Routes */
Route::any("{nodes}", function($nodes = []) {
    $host = request()->getHost();
    $host = str_replace("www.", "", $host);

    $splittedHost = explode(".", $host);

    if(count($splittedHost) >= 3) {
        return Request::handle($nodes, $host, "subdomain");
    }

    if(empty($nodes)) {
        return Request::handle($nodes, $host);
    }

    return Request::handle($nodes, $host);
})->where(["nodes" => ".*"]);



/** Centauri Extension-Routes */

// Loading all extensions
Centauri::makeInstance(ExtensionsComponent::class)->loadExtensions();

// In case there's no extension which extends routing and/or adds custom routes setting
// $routes to an empty array.
$routes = $GLOBALS["Centauri"]["Handlers"]["routes"] ?? [];

foreach($routes as $key => $routeFn) {
    if(is_array($routes[$key])) {
        $_routes = $routes[$key][key($routes[$key])];

        $foreached = false;

        foreach($_routes as $_routeFn) {
            $_routeFn();
            $foreached = true;
        }

        if(!$foreached) {
            throw new Exception("The route with key '" . $key . "' must be an array with unique keys for reach route!");
        }
    }
}
