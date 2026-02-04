<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolesandPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Define the 'backpack' guard
        $guard = config('backpack.base.guard', 'backpack');

        // Create permissions
        Permission::firstOrCreate(['name' => 'view dashboard', 'guard_name' => $guard]);
        Permission::firstOrCreate(['name' => 'manage users', 'guard_name' => $guard]);
        Permission::firstOrCreate(['name' => 'manage roles', 'guard_name' => $guard]);
        Permission::firstOrCreate(['name' => 'manage permissions', 'guard_name' => $guard]);
        Permission::firstOrCreate(['name' => 'manage imports', 'guard_name' => $guard]);
        Permission::firstOrCreate(['name' => 'manage exports', 'guard_name' => $guard]);
        Permission::firstOrCreate(['name' => 'view reports', 'guard_name' => $guard]);
        Permission::firstOrCreate(['name' => 'manage search', 'guard_name' => $guard]);
        // Add more permissions as needed

        // Create roles and assign permissions
        $superAdminRole = Role::firstOrCreate(['name' => 'superadmin', 'guard_name' => $guard]);
        $superAdminRole->givePermissionTo(Permission::all()); // Assign all permissions to super-admin

        $adminRole = Role::firstOrCreate(['name' => 'admin', 'guard_name' => $guard]);
        $adminRole->givePermissionTo(['view dashboard']);
        $adminRole->givePermissionTo(['manage imports', 'manage exports', 'view reports']);
        $adminRole->givePermissionTo(['manage search']);
        // Assign specific permissions to other roles

        $userRole = Role::firstOrCreate(['name' => 'user', 'guard_name' => $guard]);
        $userRole->givePermissionTo(['view dashboard']);
        $userRole->givePermissionTo(['manage search']);
        // Assign basic permissions to the user role
    }
}
