<?php

return [
    "tabs" => [
        "inputs" => [
            "label" => "Inputs",

            "fields" => [
                "row" => [
                    "HTMLType" => "HTML",
                    "type" => "row",
                    "html" => "<div class='row'><div class='col-12 col-lg-6'></div><div class='col-12 col-lg-6'></div></div>",

                    "config" => [
                        "intern_label" => "Row",
                    ]
                ],

                "input" => [
                    "HTMLType" => "input",
                    "type" => "text",

                    "config" => [
                        "label" => "Input",
                        "placeholder" => "Input"
                    ]
                ],

                "textarea" => [
                    "HTMLType" => "textarea",

                    "config" => [
                        "label" => "Textarea",
                        "placeholder" => "Textarea",
                        "rows" => "5"
                    ]
                ]
            ]
        ],

        "radiocheckboxes" => [
            "label" => "Radio/Checkboxes",

            "fields" => [
                "radio" => [
                    "HTMLType" => "input",
                    "type" => "radio",

                    "config" => [
                        "label" => "Lmao"
                    ]
                ]
            ]
        ],

        "texts" => [
            "label" => "Texts",

            "fields" => [
                "h4" => [
                    "HTMLType" => "HTML",
                    "type" => "TextTag",
                    "html" => "<h4 class='m-0'>H4</h4>"
                ],
                "h5" => [
                    "HTMLType" => "HTML",
                    "type" => "TextTag",
                    "html" => "<h5 class='m-0'>H5</h5>"
                ],
                "h6" => [
                    "HTMLType" => "HTML",
                    "type" => "TextTag",
                    "html" => "<h6 class='m-0'>H6</h6>"
                ],
                "p" => [
                    "HTMLType" => "HTML",
                    "type" => "TextTag",
                    "html" => "<p class='m-0'>P</p>"
                ]
            ]
        ]
    ]
];
