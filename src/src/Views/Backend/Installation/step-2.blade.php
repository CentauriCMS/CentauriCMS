@php
    $domain = $_SERVER["HTTP_HOST"] ?? null;
    $hasSSL = ($_SERVER["REQUEST_SCHEME"] == "https" ? " checked" : "");

    $centauriInstallData = session()->get("centauri_install_data") ?? false;
@endphp

@extends("Centauri::Backend.installation")

@section("content")
    <form method="POST" action="{!! Centauri\CMS\BladeHelper\URIBladeHelper::link("/centauri/install/action/domain") !!}">
        <div class="row">
            <div class="col-12 col-lg-7 form-col">
                <h4 class="mb-2 font-fatfrank">
                    <b>Identifier.</b>
                </h4>

                <p>
                    For the installation instance this is your "main"-domain configuration file,<br>
                    so you can't change it for this one. <br><br>

                    For new records you can define that inside the Backend of Centauri.
                </p>
            </div>

            <div class="col-12 col-lg-5">
                <div class="w-100">
                    <div class="ci-field">
                        <input class="form-control" type="text" name="identifier" id="identifier" value="{{ $centauriInstallData["identifier"] ?? 'Main' }}" />

                        <label class="active" for="identifier">
                            Identifier
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <hr>

        <div class="row">
            <div class="col-12 col-lg-7 form-col">
                <h4 class="mb-2 font-fatfrank">
                    <b>Domain.</b>
                </h4>

                <p>
                    Here you'll have to put in the domain-/host-name for this application.</br><br>

                    E.g. if your development / live environment's domain is equal to<br>
                    <b>centauricms.de</b>, then you'd have to use that as the given host name.
                </p>
            </div>

            <div class="col-12 col-lg-5">
                <div class="w-100">
                    <div class="ci-field">
                        @if($centauriInstallData["domain"] || !is_null($domain))
                            <input class="form-control" type="text" name="domain" id="domain" value="{{ $centauriInstallData["domain"] ?? $domain }}" />

                            <label class="active" for="domain">
                                Domain (Auto-Detected)
                            </label>
                        @else
                            <input class="form-control" type="text" name="domain" id="domain" />

                            <label for="domain">
                                Domain
                            </label>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <hr>

        <div class="row">
            <div class="col-12 col-lg-7 form-col">
                <h4 class="mb-2 font-fatfrank">
                    <b>SSL.</b>
                </h4>

                <p>
                    Here you can simply define if you would like / your environment has<br>
                    a certified SSL or not.
                </p>
            </div>

            <div class="col-12 col-lg-5">
                <div class="w-100">
                    <div class="ci-switch">
                        <label for="ssl">
                            <input type="checkbox" name="ssl" id="ssl"{{ $hasSSL || $centauriInstallData["ssl"] == " checked" ? " checked" : "" }} />

                            <span></span>

                            Environment SSL
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <hr>

        <div class="row">
            <div class="col-12 col-lg-7 form-col">
                <h4 class="mb-2 font-fatfrank">
                    <b>Frontend Page-Title-Prefix.</b>
                </h4>

                <p>
                    Here you can simply define if you would like / your environment has<br>
                    a certified SSL or not.
                </p>
            </div>

            <div class="col-12 col-lg-5">
                <div class="w-100">
                    <div class="ci-field">
                        <input class="form-control" type="text" name="pagetitleprefix" id="pagetitleprefix" value="{{ $centauriInstallData['pagetitleprefix'] ?? 'CentauriCMS »'}}" />

                        <label class="active" for="pagetitleprefix">
                            Page Title Prefix
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <hr>

        <div class="row">
            <div class="col">
                <a role="button" href="{!! Centauri\CMS\BladeHelper\URIBladeHelper::link("/centauri/install") !!}" class="btn btn-info waves-effect waves-light">
                    Step 1
                </a>
            </div>

            <div class="col text-right">
                <button type="submit" href="{!! Centauri\CMS\BladeHelper\URIBladeHelper::link("/centauri/install/step/3") !!}" class="btn btn-primary waves-effect waves-light">
                    Step 3
                </button>
            </div>
        </div>
    </form>
@endsection
