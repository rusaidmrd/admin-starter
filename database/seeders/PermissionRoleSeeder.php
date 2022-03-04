<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // set all permissions to Admin Role
        $allPermissions = Permission::all();
        Role::findOrFail(1)->permissions()->sync($allPermissions->pluck('id'));

        // set permissions to Manager Role
        // 1. filter all permission for not to include user, role and permissions crud functions
        $managerPermissions = $allPermissions->filter(function($permission){
            return
                substr($permission->name,0,5) !='user_'
                && substr($permission->name,0,5) !='role_'
                && substr($permission->name,0,11) !='permission_';
        });

        Role::findOrFail(2)->permissions()->sync($managerPermissions->pluck('id'));
    }
}
