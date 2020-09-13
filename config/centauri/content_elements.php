<?php

return [
    "fields" => [
        "htag" => [
            "label" => "H-Tag",
            "type" => "select",

            "config" => [
                // "default" => [
                //     "H1",
                //     "h1"
                // ],
                "required" => 1,

                "items" => [
                    [
                        "H1",
                        "h1"
                    ],

                    [
                        "H2",
                        "h2"
                    ],

                    [
                        "H3",
                        "h3"
                    ],

                    [
                        "H4",
                        "h4"
                    ],

                    [
                        "H5",
                        "h5"
                    ],

                    [
                        "H6",
                        "h6"
                    ]
                ]
            ]
        ],

        "header" => [
            "label" => "Header",
            "type" => "input",

            "config" => [
                "required" => 1
            ]
        ],

        "subheader" => [
            "label" => "Subheader",
            "type" => "input"
        ],

        "RTE" => [
            "label" => "RTE",
            "type" => "RTE"
        ],

        "plugin" => [
            "label" => "Plugin",
            "type" => "plugin"
        ],

        "grid" => [
            "label" => "Container (Full)",
            "type" => "grid",
            "additionalType" => "grid",
            "return_statement" => "MERGE"
        ],

        "image" => [
            "label" => "Image",
            "type" => "image",

            "config" => [
                "required" => 1,
                "minItems" => 1,
                "maxItems" => 2,
                "validation" => \Centauri\CMS\Validation\FileValidation::class
            ]
        ],

        "file" => [
            "label" => "File",
            "type" => "file",

            "config" => [
                "required" => 1,
                "maxItems" => 1
            ]
        ],

        "colorpicker" => [
            "label" => "Color",
            "type" => "input",
            "renderAs" => [
                "type" => "colorpicker"
            ]
        ],

        "grid_fullsize" => [
            "label" => "Container Fullsize?",
            "type" => "checkbox",
            "colAdditionalClasses" => "d-flex align-items-center"
        ],

        "grid_space_top" => [
            "label" => "Top Space",
            "type" => "select",

            "config" => [
                "items" => [
                    ["MT-1", "mt-1"],
                    ["MT-2", "mt-2"],
                    ["MT-3", "mt-3"],
                    ["MT-4", "mt-4"],
                    ["MT-5", "mt-5"]
                ]
            ]
        ],

        "grid_space_bottom" => [
            "label" => "Bottom Space",
            "type" => "select",

            "config" => [
                "items" => [
                    ["MB-1", "mb-1"],
                    ["MB-2", "mb-2"],
                    ["MB-3", "mb-3"],
                    ["MB-4", "mb-4"],
                    ["MB-5", "mb-5"]
                ]
            ]
        ]
    ],

    "elements" => [
        // "headerimage" => [
        //     "image",
        //     "header;subheader",
        //     "RTE"
        // ],

        "plugin" => [
            "header;plugin"
        ],

        "grids" => [
            "grid"
        ]
    ],

    "tabs" => [
        "general" => [
            "label" => "backend/modals.newContentElement.Tabs.general",

            "elements" => [
                // "headerimage"
            ]
        ],

        "special" => [
            "label" => "backend/modals.newContentElement.Tabs.special",

            "elements" => [
                "plugin"
            ]
        ],

        "grids" => [
            "label" => "Grids",

            "elements" => [
                "grids"
            ]
        ]
    ],

    // "fieldConfiguration" => [
        // "headerimage" => [
        //     "select" => [
        //         "label" => "woooow"
        //     ]
        // ]
    // ]
];
