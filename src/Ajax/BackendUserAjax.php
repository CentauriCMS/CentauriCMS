<?php
namespace Centauri\CMS\Ajax;

use Centauri\CMS\Centauri;
use Centauri\CMS\Repository\BackendRoleRepository;
use Centauri\CMS\Repository\BackendUserRepository;
use Centauri\CMS\Traits\AjaxTrait;
use Illuminate\Http\Request;

class BackendUserAjax
{
    use AjaxTrait;

    /**
     * The BackendUser-Repository implementation.
     */
    protected $backendUserRepository;

    /**
     * The BackendRole-Repository implementation.
     */
    protected $backendRoleRepository;

    /**
     * Create repository instances for this ajax-class.
     * 
     * @return void
     */
    public function __construct()
    {
        $this->backendUserRepository = Centauri::makeInstance(BackendUserRepository::class);
        $this->backendRoleRepository = Centauri::makeInstance(BackendRoleRepository::class);
    }

    /**
     * This function returns data of a specific backend user record by its uid.
     * 
     * @param Request $request The request object given by the request-method above.
     * 
     * @return json|response
     */
    public function findByUidAjax(Request $request)
    {
        $uid = $request->input("uid");
        $beUser = $this->backendUserRepository->findByUid($uid);

        $beUser->__roles = $beUser->getRoles();

        return json_encode($beUser);
    }

    public function updateAjax(Request $request)
    {
        $formData = $request->input("formData");

        $uid = $formData["uid"];
        $hidden = $formData["hidden"];
        $username = $formData["username"];
        $firstname = $formData["firstname"];
        $lastname = $formData["lastname"];

        $beUser = $this->backendUserRepository->findByUid($uid);

        $beUser->hidden = boolval($hidden);
        $beUser->username = $username;
        $beUser->firstname = $firstname;
        $beUser->lastname = $lastname;

        return $beUser->save();
    }

    public function removeRoleByUidAjax(Request $request)
    {
        $userUid = $request->input("userUid");
        $roleUid = $request->input("roleUid");

        $beUser = $this->backendUserRepository->findByUid($userUid);
        $beRole = $this->backendRoleRepository->findByUid($roleUid);

        $roles = $beUser->getRoles();
        $newRoles = [];

        foreach($roles as $role) {
            if($role->uid != $beRole->uid) {
                $newRoles[] = $role;
            }
        }

        return json_encode($beUser->setRoles($newRoles));
    }

    public function updateRolesByUidsAjax(Request $request)
    {
        $roleUids = $request->input("roleUids");

        if(is_null($roleUids)) {
            $roleUids = [];
        }

        foreach($roleUids as $key => $value) {
            $roleUids[$key] = (int) $value;
        }

        $jsonRolesUids = json_encode($roleUids);

        $beUserUid = $request->input("userUid");
        $beUser = $this->backendUserRepository->findByUid($beUserUid);

        $beUser->roles = $jsonRolesUids;

        return $beUser->save();
    }
}
