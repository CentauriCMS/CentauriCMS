<?php

return [
    "default" => [
        /** NOTE: When using AdditionalDatas within the same class here, those additionaldata-calls has to be moved into the static rendering method! */
        "rendering" => \Centauri\Extension\Frontend\Frontend::class,
        "template" => "centauri_frontend::Frontend.Templates.Page.frontend",
        "label" => "backend/be_layout.layouts.default.label",

        "config" => [
            /** rowPos - will be saved into the DB as key */
            0 => [
                /** "cols" => Array */
                "cols" => [
                    /** colPositions - will be saved into the DB as key */
                    0 => [
                        "label" => "backend/be_layout.layouts.default.cols.content"
                    ]
                ]
            ]
        ]
    ]
];
