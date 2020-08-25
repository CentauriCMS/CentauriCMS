<?php
namespace Centauri\AdditionalDatas;

class PluginAdditionalDatas implements \Centauri\Interfaces\AdditionalDataInterface
{
    public function fetch()
    {
        return [
            "plugins" => $GLOBALS["Centauri"]["Plugins"]
        ];
    }

    public function onEditListener($element)
    {
        //
    }

    public function getAdditionalData($data)
    {
        return [
            "plugins" => $GLOBALS["Centauri"]["Plugins"]
        ];
    }
}
