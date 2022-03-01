<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $manageUser = new Permission();
        // $manageUser->name = 'Manage users';
        // $manageUser->slug = 'manage-users';
        // $manageUser->save();

        // $createProduct = new Permission();
        // $createProduct->name = 'Create Products';
        // $createProduct->slug = 'create-products';
        // $createProduct->save();

        Permission::factory()->count(30)->create();
    }
}
