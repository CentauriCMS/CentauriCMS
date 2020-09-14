<?php
namespace Centauri\CMS\Helper;

/**
 * This class is for including asset files such as .css / .js files or images - optionally $revision can be passed
 * to determine if you're calling the static method with the purpose of serving it with revisions or not.
 */
class AssetHelper
{
    /**
     * Options for this class.
     *
     * @var array
     */
    protected static $options = [
        "manifestFileName" => "rev-manifest.json"
    ];

    /**
     * This method returns the revisioned-file with an absolute path to itself as a source-link.
     * 
     * @param string $path The path/directory where to look for the file which is specified by the second parameter.
     * @param string $name The name to find get the versioned URL - the file itself will be searched inside the $path.
     * @param string $options Optional. If you need to "overwrite" default options of this class.
     * 
     * @return string
     */
    public static function revInclude($path, $name, $options = [])
    {
        $options = array_merge(self::$options, $options);
        $manifestFileName = $options["manifestFileName"];

        $revManifestContent = json_decode(file_get_contents($path . "../../" . $manifestFileName));

        $centauriBasePath = config("app")["url"];
        $centauriRelBasePath = centauriconfig("server")["PATHS"]["centauri_relative_base"];

        $appPath = $centauriBasePath . $centauriRelBasePath;

        return $appPath . $path . (isset($revManifestContent->$name) ? $revManifestContent->$name : $name);
    }

    /**
     * Builds an absolute path to the by the given $source.
     * 
     * @param string $path
     * 
     * @return string
     */
    public static function include($path)
    {
        $appPath = config("app")["url"];

        return $appPath . "/" . $path;
    }
}
