<?php
namespace Centauri\CMS\Repository;

use Centauri\CMS\Model\BeUser;
use Centauri\CMS\Repository\Repository;

class BackendUserRepository extends Repository
{
    public function __construct()
    {
        $this->setEloquent(BeUser::class);
    }
}
