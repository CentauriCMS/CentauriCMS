<?php

return [
    "PATHS" => [
        "centauri_storage" => base_path("storage/Centauri") . "/",
        "centauri_storage_extensions" => base_path("storage/Centauri/Extensions") . "/"
    ],

    "KERNEL_LEVEL_CACHING" => [
        "status" => false,
        "callback" => \Centauri\Caches\KernelLevelCache::class,

        "filteredSlugs" => [
            "/centauri",
            "/storage",
            "/action",
            "/csrf-token"
        ]
    ]
];
