@php
    $host = $_SERVER["HTTP_HOST"] ?? null;
@endphp

@extends("Centauri::Backend.installation")

@section("content")
    <div class="row">
        <div class="col-12">
            <p>
                As overview, you configuration looks like below.
            </p>

            <hr>

            <div class="row">
                <div class="col-12 col-lg">
                    <b>
                        Identifier
                    </b>
                </div>

                <div class="col-12 col-lg">
                    <b>
                        Host-Name
                    </b>
                </div>

                <div class="col-12 col-lg">
                    <b>
                        SSL
                    </b>
                </div>

                <div class="col-12 col-lg">
                    <b>
                        Page-Title-Prefix
                    </b>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-lg">
                    {{ session()->get("centauri_install_data")["identifier"] }}
                </div>

                <div class="col-12 col-lg">
                    {{ session()->get("centauri_install_data")["domain"] }}
                </div>

                <div class="col-12 col-lg">
                    {{ (session()->get("centauri_install_data")["ssl"] == " checked" ? "ON" : "OFF") }}
                </div>

                <div class="col-12 col-lg">
                    {{ session()->get("centauri_install_data")["pagetitleprefix"] }}

                    <p class="mb-0">
                        (E.g.: {{ session()->get("centauri_install_data")["pagetitleprefix"] }} Home)
                    </p>
                </div>
            </div>
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col">
            <a role="button" href="/centauri/install/step/2" class="btn btn-info waves-effect waves-light">
                Step 2
            </a>
        </div>

        <div class="col text-right">
            <a role="button" href="/centauri/install/action/finish" class="btn btn-primary waves-effect waves-light">
                Finish
            </a>
        </div>
    </div>
@endsection
