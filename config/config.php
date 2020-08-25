<?php

return [
    /** @see https://docs.centauricms.de/config/caching */
    "Caching" => [
        "state" => false,
        "type" => "STATIC_FILE_CACHE", # DEFAULT or STATIC_FILE_CACHE
        "imagesToBase64" => true
    ],

    /** @see https://docs.centauricms.de/config/frontend */
    "FE" => [
        # "Default" in case a beLayout has no "template"-definition so it will use this one as default.
        "DefaultMainTemplate" => "centauri_frontend::Frontend.Templates.frontend",
        "keepSiteAlive" => false
    ],

    "Grids" => [
        "templateRootPath" => "EXT:centauri_frontend"
    ]
];
