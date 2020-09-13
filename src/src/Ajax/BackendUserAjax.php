<?php
namespace Centauri\CMS\Ajax;

use Centauri\CMS\Centauri;
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
     * Create repository instances for this ajax-class.
     * 
     * @return void
     */
    public function __construct()
    {
        $this->backendUserRepository = Centauri::makeInstance(BackendUserRepository::class);
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
}
