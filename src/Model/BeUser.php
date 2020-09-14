<?php
namespace Centauri\CMS\Model;

use Illuminate\Database\Eloquent\Model;

class BeUser extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "be_users";

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
    protected $attributes = [];

    /**
     * Returns the roles of this backend user.
     * 
     * @return array|void
     */
    public function getRoles()
    {
        $roles = [];

        foreach(json_decode($this->roles, true) as $rolesUid) {
            $roles[] = BeRole::where("uid", $rolesUid)->get()->first();
        }

        return $roles;
    }

    public function setRoles(array $roles)
    {
        $rolesUidArray = [];

        foreach($roles as $role) {
            $rolesUidArray[] = $role->uid;
        }

        $this->roles = json_encode($rolesUidArray);

        return $this->save();
    }
}
