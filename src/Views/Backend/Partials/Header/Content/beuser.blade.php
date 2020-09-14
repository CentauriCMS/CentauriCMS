@php
    $beUser = \Centauri\CMS\BladeHelper\BeUserBladeHelper::get();

    $attributes = [
        "Username" => "username",
        "Firstname" => "firstname",
        "Lastname" => "lastname",
        "E-Mail" => "email"
    ];
@endphp

<div class="col-12 px-3">
    @foreach($attributes as $property => $value)
        <div class="row">
            <div class="col-12 col-lg-6">
                {{ $property }}:
            </div>

            <div class="col-12 col-lg-6">
                {{ $beUser->getAttribute($value) }}
            </div>
        </div>
    @endforeach
</div>

<hr>

<div class="col-12">
    <a role="button" class="btn btn-danger waves-effect waves-light p-3" data-ajax="true" data-ajax-handler="Backend" data-ajax-action="logout" style="font-size: 16px;">
        <span style="color: white; text-transform: none;">
            Logout
        </span>

        <i class="fas fa-sign-out-alt fa-lg d-inline ml-1"></i>
    </a>
</div>
