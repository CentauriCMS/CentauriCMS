<?php

if(!function_exists("centauriconfig")) {
    function centauriconfig($identifier)
    {
        return config("centauri")[$identifier];
    }
}
