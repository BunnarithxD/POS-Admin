<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;
use App\Models\User;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        //  Define Permissions
        $permissions = [
            'write articles', 'read articles', 'edit articles', 'delete articles'
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }
        
        //  Define Roles and their Permissions
        $rolesAndPermissions = [
            'admin' => ['write articles', 'read articles', 'edit articles', 'delete articles'],
            'manager' => ['read articles', 'edit articles'],
            'waiter' => ['read articles']
        ];
        
        $admin = null; // define variable for later use

        foreach ($rolesAndPermissions as $roleName => $permissionNames) {
            $role = Role::firstOrCreate(['name' => $roleName]);
            $role->syncPermissions($permissionNames);

            if ($roleName === 'admin') {
                $admin = $role;
            }
        }

        // Assign admin role to first user
        $user = User::first();
        if ($user && $admin && !$user->hasRole('admin')) {
            $user->assignRole($admin);
        }
    }
}
