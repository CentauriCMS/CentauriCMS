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
