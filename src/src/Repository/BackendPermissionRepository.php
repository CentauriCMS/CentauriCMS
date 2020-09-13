<?php
namespace Centauri\CMS\Repository;

use Centauri\CMS\Model\BePermission;
use Centauri\CMS\Repository\Repository;

class BackendPermissionRepository extends Repository
{
    public function __construct()
    {
        $this->setEloquent(BePermission::class);
    }
}
