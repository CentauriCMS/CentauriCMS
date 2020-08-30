<?php
namespace Centauri\CMS\Helper;

/**
 * This class is for including asset files such as .css / .js files which are versioned and using the "gulp-rev" npm-module.
 */
class GulpRevHelper
{
    /**
     * This method will return the absolute OR relative URL (if specified) of the requested rev-file.
     * It's only made for relative paths and wouldn't make any sense anyways to load an external .css-/.js-file from another host.
     * 
     * @param string $pubDirName Public-Directory-Name (pubDirName) defines your directory inside of the /public/-path.
     * @param string $name The name to find get the revisioned-identifier - the file itself will be searched inside the $pubDirName.
     * @param string $manifestFileName The rev-manifest.json file which is generated and defines the versions with an unique identifier - optional.
     * 
     * @return string
     */
    public static function include($pubDirName, $name, $manifestFileName = "rev-manifest.json")
    {
        $manifestFilePath = public_path($manifestFileName);
        $content = json_decode(file_get_contents($manifestFilePath));

        $revFileName = $content->$name;

        if(!file_exists(public_path($pubDirName . "/" . $revFileName))) {
            return "/" . $pubDirName . "/" . $name;
        }

        return "/" . $pubDirName . "/" . $revFileName;
    }
}
