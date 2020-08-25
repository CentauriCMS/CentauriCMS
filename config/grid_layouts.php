<?php

$gridLayoutFieldsDefaultConfig = [
    "grid_fullsize;grid_space_top;grid_space_bottom"
];

return [
    "onecol" => [
        "label" => " » One Column Container",

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
        ],

        "gridFieldsConfig" => $gridLayoutFieldsDefaultConfig
    ],

    "twocol" => [
        "label" => " » Two Column Container",

        "config" => [
            0 => [
                "cols" => [
                    0 => [
                        "col" => "6",
                        "label" => "Left"
                    ],

                    1 => [
                        "col" => "6",
                        "label" => "Right"
                    ]
                ]
            ]
        ],

        "gridFieldsConfig" => $gridLayoutFieldsDefaultConfig
    ]
];
