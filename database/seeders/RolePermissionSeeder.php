<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    function createDefaultPermissions(): void
    {
        Permission::insert([

            array('id' => '1', 'name' => 'review services', 'guard_name' => 'admin', 'group_name' => 'Review Products', 'created_at' => NULL, 'updated_at' => NULL),
            array('id' => '2', 'name' => 'manage categories', 'guard_name' => 'admin', 'group_name' => 'Category Module', 'created_at' => NULL, 'updated_at' => NULL),
            array('id' => '12', 'name' => 'access management', 'guard_name' => 'admin', 'group_name' => 'Access Management', 'created_at' => '2025-02-18 05:38:27', 'updated_at' => '2025-02-18 05:38:27'),
            array('id' => '13', 'name' => 'payment setting', 'guard_name' => 'admin', 'group_name' => 'Payment Setting', 'created_at' => '2025-02-18 05:38:37', 'updated_at' => '2025-02-18 05:38:37'),
            array('id' => '14', 'name' => 'manage settings', 'guard_name' => 'admin', 'group_name' => 'Manage Settings', 'created_at' => '2025-02-18 05:38:48', 'updated_at' => '2025-02-18 05:38:48')

        ]);
    }
    public function run(): void
    {
        $this->createDefaultPermissions();

        $admin = new Role();
        $admin->name = 'super admin';
        $admin->guard_name = 'admin';
        $admin->save();

        $reviewer = new Role();
        $reviewer->name = 'reviewer';
        $reviewer->guard_name = 'admin';
        $reviewer->save();
        $reviewer->givePermissionTo('review services');
    }
}
