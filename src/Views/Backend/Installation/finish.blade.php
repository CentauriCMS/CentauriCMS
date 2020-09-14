@extends("Centauri::Backend.installation")

@section("content")
    <div class="row">
        <div class="col-12">
            <h4 class="font-fatfrank">
                @if($status != "SUCCESS")
                    Finish the configuration.
                @else
                    Configuration finished.
                @endif
            </h4>

            <hr>

            <p>
                @if($status == "MAIN_CONFIG_EXISTS")
                    The main <b>/storage/Centauri/Domains/main.json</b>-domain configuration file exists already.<br>
                    Should Centauri overwrite - delete the current and generate another one with the new providen information - for this application?<br>
                @endif

                @if($status == "SUCCESS")
                    @if(isset($overwritten))
                        Configuration has been overwritten at 
                    @else
                        Configuration has been saved into 
                    @endif

                    <b>/storage/Centauri/Domains/main.json</b>-file successfully.
                @endif
            </p>

            @if($status == "SUCCESS")
                <p class="mb-0">
                    The installation of this application is finished for now, you can close this tab and enjoy the Centauri CMS. 🎉
                </p>
            @endif
        </div>
    </div>

    <hr>

    <div class="row">
        @if($status == "MAIN_CONFIG_EXISTS")
            <div class="col">
                <a role="button" href="{!! Centauri\CMS\BladeHelper\URIBladeHelper::link("/centauri/install/step/2") !!}" class="btn btn-danger waves-effect waves-light">
                    Back to Step 2
                </a>
            </div>

            <div class="col text-right">
                <a role="button" href="{!! Centauri\CMS\BladeHelper\URIBladeHelper::link("/centauri/install/action/overwriteFinish") !!}" class="btn btn-warning waves-effect waves-light">
                    Overwrite
                </a>
            </div>
        @elseif($status == "SUCCESS")
            <div class="col">
                <a role="button" href="{!! Centauri\CMS\BladeHelper\URIBladeHelper::link("/") !!}" class="btn btn-primary waves-effect waves-light">
                    Frontend
                </a>
            </div>

            <div class="col text-right">
                <a role="button" href="{!! Centauri\CMS\BladeHelper\URIBladeHelper::link("/centauri/") !!}" class="btn btn-primary waves-effect waves-light">
                    Backend
                </a>
            </div>
        @endif
    </div>
@endsection
