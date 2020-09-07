<?php
namespace Centauri\CMS\Helper;

/**
 * This class is for including asset files such as .css / .js files which are versioned and using the "gulp-rev" npm-module.
 */
class GulpRevHelper
{
    protected static $options = [
        "manifestFileName" => "rev-manifest.json"
    ];

    /**
     * This method will return the absolute OR relative URL (if specified) of the requested rev-file.
     * It's only made for relative paths and wouldn't make any sense anyways to load an external .css-/.js-file from another host.
     * 
     * @param string $path The path/directory where to look for the file which is specified by the second parameter.
     * @param string $name The name to find get the versioned URL - the file itself will be searched inside the $path.
     * @param string $manifestFileName The rev-manifest.json file which is generated and defines the versions with an unique identifier - optional.
     * 
     * @return string
     */
    public static function include($path, $name, $options = [])
    {
        $options = array_merge(self::$options, $options);
        $manifestFileName = $options["manifestFileName"];

        $revManifestContent = json_decode(file_get_contents($path . "../../" . $manifestFileName));

        return "/$path" . (isset($revManifestContent->$name) ? $revManifestContent->$name : $name);
    }
}
