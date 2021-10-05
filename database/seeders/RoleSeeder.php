<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new Role();
        $admin->name = "Admin";
        $admin->slug = "admin";

        $admin->save();

        $manager = new Role();
        $manager->name = "Manager";
        $manager->slug = "Manager";
        $manager->save();

        $staff = new Role();
        $staff->name = "Staff";
        $staff->slug = "staff";
        $staff->save();
    }
}
