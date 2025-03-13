<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    public function run()
    {
        // Create roles
        $adminRole = Role::create(['name' => 'admin']);
        $userRole = Role::create(['name' => 'user']);
        $userRole = Role::create(['name' => 'Privetuser']);

        // Create permissions
        $editPermission = Permission::create(['name' => 'edit articles']);
        $viewPermission = Permission::create(['name' => 'view articles']);

        // Assign permissions to roles
        $adminRole->givePermissionTo($editPermission, $viewPermission);
        $userRole->givePermissionTo($viewPermission);

        // Assign role to user
        $user = User::find(1); // Example user with ID 1
        $user->assignRole('admin');
    }
}
