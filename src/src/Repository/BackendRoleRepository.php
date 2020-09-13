<?php
namespace Centauri\CMS\Repository;

use Centauri\CMS\Model\BeRole;
use Centauri\CMS\Repository\Repository;

class BackendRoleRepository extends Repository
{
    public function __construct()
    {
        $this->setEloquent(BeRole::class);
    }
}
