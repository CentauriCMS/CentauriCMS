<?php
namespace Centauri\CMS\Controller;

class InstallationController extends CentauriController
{
    /**
     * @return void
     */
    public function domainAction()
    {
        $params = request()->input();

        $identifier = $params["identifier"];
        $domain = $params["domain"];
        $pagetitleprefix = $params["pagetitleprefix"];
        $ssl = (isset($params["ssl"]) ? " checked" : "");

        request()->session()->put("centauri_install_data", [
            "identifier" => $identifier,
            "domain" => $domain,
            "pagetitleprefix" => $pagetitleprefix,
            "ssl" => $ssl
        ]);

        return redirect("/centauri/install/step/3");
    }

    public function finishAction()
    {
        $identifier = session()->get("centauri_install_data")["identifier"];
        $mainDomainJsonFilePath = storage_path("Centauri/Domains/$identifier.json");

        if(file_exists($mainDomainJsonFilePath)) {
            return view("Centauri::Backend.Installation.finish", [
                "status" => "MAIN_CONFIG_EXISTS",
                "step" => "FINISH",
                "stepType" => null
            ]);
        }

        return $this->finish();
    }

    public function overwriteFinishAction()
    {
        return $this->finish(true);
    }

    public function finish($domainFileExists = false)
    {
        $identifier = session()->get("centauri_install_data")["identifier"];
        $mainDomainJsonFilePath = storage_path("Centauri/Domains/$identifier.json");

        $data = session()->get("centauri_install_data");

        $data["id"] = $data["identifier"];
        $data["pageTitlePrefix"] = $data["pagetitleprefix"];

        unset($data["identifier"]);
        unset($data["pagetitleprefix"]);

        $data["rootpageuid"] = "1";

        if(isset($data["ssl"])) {
            $data["ssl"] = true;
        } else {
            $data["ssl"] = false;
        }

        $jsonData = json_encode($data, JSON_PRETTY_PRINT);

        file_put_contents($mainDomainJsonFilePath, $jsonData);

        session()->forget("centauri_install_data");

        $viewArr = [
            "status" => "SUCCESS",
            "step" => "FINISH",
            "stepType" => null,
            "overwritten" => true
        ];

        if($domainFileExists) {
            $viewArr["overwritten"] = true;
        }

        return view("Centauri::Backend.Installation.finish", $viewArr);
    }
}
