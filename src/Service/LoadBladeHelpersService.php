<?php
namespace Centauri\Service;

use Centauri\BladeHelper;
use Centauri\Helper;

class LoadBladeHelpersService
{
    public function __construct()
    {
        $bladeHelpers = [
            "ImageBladeHelper" => BladeHelper\ImageBladeHelper::class,
            "BuildBladeHelper" => BladeHelper\BuildBladeHelper::class,
            "URIBladeHelper" => BladeHelper\URIBladeHelper::class,
            "TreeHelper" => Helper\TreeHelper::class
        ];

        return $bladeHelpers;
    }
}
