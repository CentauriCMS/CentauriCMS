<?php

return [
    /** @see https://docs.centauricms.de/config/caching */
    "Caching" => [
        "state" => false,

        # Possible values are: DEFAULT|STATIC_FILE_CACHE
        "type" => "STATIC_FILE_CACHE",

        "imagesToBase64" => false
    ],

    /** @see https://docs.centauricms.de/config/frontend */
    "FE" => [
        # "Default" in case a backend_layout has no "template"-definition so it will use this one as default (fallback).
        "DefaultMainTemplate" => "centauri_frontend::Frontend.Templates.frontend",
        "keepSiteAlive" => false
    ],

    "Grids" => [
        "templateRootPath" => "EXT:centauri_frontend"
    ]
];
