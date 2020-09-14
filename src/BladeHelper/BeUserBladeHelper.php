<?php
namespace Centauri\CMS\BladeHelper;

class BeUserBladeHelper
{
    public static function get()
    {
        return request()->session()->get("CENTAURI_BE_USER");
    }
}
