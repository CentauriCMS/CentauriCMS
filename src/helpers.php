<?php

if(!function_exists("centauriconfig")) {
    function centauriconfig($identifier)
    {
        if(!isset(config("centauri")[$identifier])) {
            return false;
        }

        return config("centauri")[$identifier] ?? false;
    }
}

if(!function_exists("root_path")) {
    function root_path($additionalPath = "", $absolute = false)
    {
        $path = "/";

        if($additionalPath != "") {
            if($additionalPath[0] != "/") {
                $path = $path . $additionalPath;
            } else {
                $path = $additionalPath;
            }
        }

        if($absolute) {
            $path = config("app")["url"] . $path;
        }

        return $path;
    }
}

if(!function_exists("root_public_path")) {
    function root_public_path($path = "", $absolute = false)
    {
        $_path = "/public/" . $path;

        if($absolute) {
            $_path = root_path($_path, $absolute);
        }

        return $_path;
    }
}
