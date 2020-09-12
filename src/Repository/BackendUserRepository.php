<?php
namespace Centauri\CMS\Repository;

use Centauri\CMS\Model\BeUser;
use Centauri\CMS\Repository;

class BackendUserRepository extends Repository
{
    public function __construct()
    {
        $this->setTable("be_users");
        $this->setEloquent(BeUser::class);
    }
}
