<?php
namespace Centauri\Service;

use Centauri\Centauri;
use Centauri\Utility\PathUtility;

class PathService
{
    /**
     * Init method of this class
     * 
     * @return void
     */
    public function init()
    {
        $PathUtility = Centauri::makeInstance(PathUtility::class);

        $GLOBALS["Centauri"]["Paths"]["BaseURL"] = $PathUtility->getBaseURL();
        $GLOBALS["Centauri"]["Paths"]["BackendURL"] = $PathUtility->getBackendURL();
    }
}
