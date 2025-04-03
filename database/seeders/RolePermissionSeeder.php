<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Define permissions
        $permissions = [
            'view medical types',
            'edit medical types',
            'create medical types',
            'delete medical types',
            'view companies',
            'edit companies',
            'create companies',
            'delete companies',
            // Add more permissions as needed
        ];

        // Create permissions
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Define roles and assign permissions to roles
        $roles = [
            'admin' => [
                'view medical types',
                'edit medical types',
                'create medical types',
                'delete medical types',
                'view companies',
                'edit companies',
                'create companies',
                'delete companies',
            ],
            'medical_manager' => [
                'view medical types',
                'edit medical types',
                'create medical types',
            ],
            'company_manager' => [
                'view companies',
                'edit companies',
                'create companies',
            ],
            // Add more roles and permissions as needed
        ];

        // Create roles and assign permissions to them
        foreach ($roles as $roleName => $permissionsList) {
            // Create role
            $role = Role::create(['name' => $roleName]);

            // Assign permissions to the role
            foreach ($permissionsList as $permissionName) {
                $permission = Permission::where('name', $permissionName)->first();
                $role->givePermissionTo($permission);
            }
        }
    }
}
