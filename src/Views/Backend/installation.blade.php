<!DOCTYPE html>
<html>
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <title>CentauriCMS » Installation</title>

        <link rel="stylesheet" href="{{ Centauri\CMS\Helper\GulpRevHelper::include(
            "/public",
            "backend/css",
            "centauri.min.css"
        ) }}">
    </head>

    <body>
        <section id="header">
            <div class="container-fluid sticked h-100">
                <div class="nav-wrapper justify-content-space-between h-100-childs flex-centration-childs flex-ai-center-childs p-3">
                    <div>
                        <a class="anim-underline" style="cursor: default;color: #fff;font-size: 26px;font-weight: bold;color: #ff699b;font-family: fatfrank;">
                            CentauriCMS<div class="mx-1 d-inline-block" style="color:#fff; position: relative; top: -2px; ">»</div><font color="gold">Installation</font>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <section id="content" class="overflow-auto h-100 pb-5">
            <div class="container mt-3 mb-5 my-lg-5">
                <style>
                    @media (min-width: 992px) {
                        .form-col {
                            margin-top: 15px;
                        }
                    }
                </style>

                @if($step == 0 && is_int($step))
                    <div class="row">
                        <div class="col-12">
                            <h4>
                                Thanks for choosing the Centauri CMS.
                            </h4>

                            <hr>

                            <p>
                                This installtion guide will lead you properly configuring this application of Centauri.<br/>
                                To continue and starting the configuration please click the button below.
                            </p>

                            <hr>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 text-lg-right">
                            <a role="button" href="/centauri/install/step/2" class="btn btn-primary waves-effect waves-light">
                                Configure Domain
                            </a>
                        </div>
                    </div>
                @elseif($step == "FINISH")
                    @yield("content")
                @else
                    <h2 class="font-fatfrank">
                        Step {{ $step }} {{ $stepType }}
                    </h2>

                    <hr>

                    @yield("content")
                @endif
            </div>
        </section>

        <script>function CentauriEnv(){return null;}</script>

        <script src="{{ Centauri\CMS\Helper\GulpRevHelper::include(
            "/public",
            "backend/js",
            "centauri.min.js"
        ) }}" async defer></script>
    </body>
</html>
