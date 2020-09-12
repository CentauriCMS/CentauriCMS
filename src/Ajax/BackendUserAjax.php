<?php
namespace Centauri\CMS\Ajax;

use Centauri\CMS\Repository\BackendUserRepository;
use Centauri\CMS\Repository\Repository;
use Centauri\CMS\Traits\AjaxTrait;
use Illuminate\Http\Request;

class BackendUserAjax extends Repository
{
    use AjaxTrait;

    /**
     * The BackendUser-Repository implementation.
     * 
     * @var BackendUserRepository
     */
    protected $backendUserRepository;

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

        dd($this->backendUserRepository);
    }
}
