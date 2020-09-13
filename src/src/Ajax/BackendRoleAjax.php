<?php
namespace Centauri\CMS\Ajax;

use Centauri\CMS\Centauri;
use Centauri\CMS\Repository\BackendPermissionRepository;
use Centauri\CMS\Repository\BackendRoleRepository;
use Centauri\CMS\Traits\AjaxTrait;
use Illuminate\Http\Request;

class BackendRoleAjax
{
    use AjaxTrait;

    /**
     * The BackendRole-Repository implementation.
     */
    protected $backendRoleRepository;

    /**
     * The BackendPermission-Repository implementation.
     */
    protected $backendPermissionRepository;

    /**
     * Create repository instances for this ajax-class.
     * 
     * @return void
     */
    public function __construct()
    {
        $this->backendRoleRepository = Centauri::makeInstance(BackendRoleRepository::class);
        $this->backendPermissionRepository = Centauri::makeInstance(BackendPermissionRepository::class);
    }

    /**
     * @param Request $request The request object given by the request-method above.
     * 
     * @return json|response
     */
    public function editInEditorComponentAjax(Request $request)
    {
        $uid = $request->input("value");

        $beRole = $this->backendRoleRepository->findByUid($uid);
        $beRole->__permissions = $beRole->getPermissions();

        return json_encode($beRole);
    }

    /**
     * Removes a specific (by the uid) permission from a specific (also by its uid) given BackendRole-Record.
     * 
     * @param Request $request The request object given by the request-method above.
     * 
     * @return json|response
     */
    public function removePermissionByUidAjax(Request $request)
    {
        $roleUid = $request->input("roleUid");
        $permissionUid = $request->input("permissionUid");

        $beRole = $this->backendRoleRepository->findByUid($roleUid);
        $bePerm = $this->backendPermissionRepository->findByUid($permissionUid);

        $permissions = $beRole->getPermissions();
        $newPermissions = [];

        foreach($permissions as $permission) {
            if($permission->uid != $bePerm->uid) {
                $newPermissions[] = $permission;
            }
        }

        return json_encode($beRole->setPermissions($newPermissions));
    }

    
    /**
     * @param Request $request The request object given by the request-method above.
     * 
     * @return json|response
     */
    public function findByUidAjax(Request $request)
    {
        $uid = $request->input("uid");

        $beRole = $this->backendRoleRepository->findByUid($uid);
        $beRole->__permissions = $beRole->getPermissions();

        return json_encode($beRole);
    }

    public function updatePermissionsByUidsAjax(Request $request)
    {
        $permissionUids = $request->input("permissionUids");
        
        foreach($permissionUids as $key => $value) {
            $permissionUids[$key] = (int) $value;
        }

        $jsonPermissionsUids = json_encode($permissionUids);

        $beRoleUid = $request->input("roleUid");
        $beRole = $this->backendRoleRepository->findByUid($beRoleUid);

        $beRole->permissions = $jsonPermissionsUids;

        return $beRole->save();
    }
}
