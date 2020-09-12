<?php
namespace Centauri\CMS\Ajax;

use Illuminate\Http\Request;
use Centauri\CMS\Centauri;
use Centauri\CMS\Repository\BackendUserRepository;
use Centauri\CMS\Traits\AjaxTrait;

class BackendUserAjax
{
    use AjaxTrait;

    /**
     * The BackendUser-Repository implementation.
     * 
     * @var BackendUserRepository
     */
    protected $backendUserRepository;

    public function __construct()
    {
        $a = Centauri::makeInstance(BackendUserRepository::class);
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

        dd($this->backendUserRepository);
    }
}
