<?php
namespace Centauri\CMS\Ajax;

use Centauri\CMS\Centauri;
use Centauri\CMS\Repository\BackendPermissionRepository;
use Centauri\CMS\Traits\AjaxTrait;
use Illuminate\Http\Request;

class BackendPermissionAjax
{
    use AjaxTrait;

    /**
     * The BackendRole-Repository implementation.
     */
    protected $backendPermissionRepository;

    /**
     * Create repository instances for this ajax-class.
     * 
     * @return void
     */
    public function __construct()
    {
        $this->backendPermissionRepository = Centauri::makeInstance(BackendPermissionRepository::class);
    }

    /**
     * @param Request $request The request object given by the request-method above.
     * 
     * @return json|response
     */
    public function findByUidAjax(Request $request)
    {
        $uid = $request->input("uid");

        $bePermission = $this->backendPermissionRepository->findByUid($uid);

        return json_encode($bePermission);
    }

    /**
     * Returns all BackendPermission-Eloquents as json.
     * 
     * @param Request $request The request object given by the request-method above.
     * 
     * @return json|response
     */
    public function listAjax(Request $request)
    {
        $bePermissions = $this->backendPermissionRepository->findAll();

        return json_encode($bePermissions);
    }
}
