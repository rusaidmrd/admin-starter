<?php
namespace App\Traits;

use App\Models\Role;
use App\Models\Permission;


trait HasRolesAndPermissions {
    /**
     * @return mixed
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class,'admin_users_roles');
    }

    /**
     * @return mixed
     */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class,'admin_users_permissions');
    }


    /**
     * @param mixed ...$roles
     * @return bool
     */
    public function hasRole(... $roles ) {
        foreach ($roles as $role) {
            if ($this->roles->contains('slug', $role)) {
                return true;
            }
        }
        return false;
    }
}
