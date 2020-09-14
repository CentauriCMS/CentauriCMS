<?php
namespace Centauri\CMS\Model;

use Illuminate\Database\Eloquent\Model;

class BeRole extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "be_roles";

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = "uid";

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    const CREATED_AT = "created_at";
    const UPDATED_AT = "updated_at";

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
    ];

    /**
     * Returns the permissions of this role.
     * 
     * @return array|void
     */
    public function getPermissions()
    {
        $permissions = [];

        if(is_null($this->permissions) || $this->permissions == "null") {
            return [];
        }

        foreach(json_decode($this->permissions, true) as $permissionUid) {
            $permissions[] = BePermission::where("uid", $permissionUid)->get()->first();
        }

        return $permissions;
    }

    public function setPermissions(array $permissions)
    {
        $permsUidArray = [];

        foreach($permissions as $permission) {
            $permsUidArray[] = $permission->uid;
        }

        $this->permissions = json_encode($permsUidArray);

        return $this->save();
    }
}
