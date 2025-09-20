<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // 1. Define Permissions
        $permissions = [
            'write articles', 'read articles', 'edit articles', 'delete articles'
        ];

        // Create permissions if they don't already exist
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }
        
        // 2. Define Roles and their Permissions
        $rolesAndPermissions = [
            'admin' => ['write articles', 'read articles', 'edit articles', 'delete articles'],
            'manager' => ['read articles', 'edit articles'],
            'waiter' => ['read articles']
        ];
        
        // Loop through roles and assign permissions
        foreach ($rolesAndPermissions as $roleName => $permissionNames) {
            $role = Role::firstOrCreate(['name' => $roleName]);
            $role->syncPermissions($permissionNames);
        }
    }
}