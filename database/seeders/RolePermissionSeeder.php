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
        // إنشاء مستخدم
        $user = User::create([
    'email' => "mohammedalmostfa36@gmail.com",
    'password' => bcrypt("P@ssw0rd123") // أو Hash::make("P@ssw0rd123")
]);

        // إنشاء الأدوار
        $adminRole = Role::create(['name' => 'admin']);
        $userRole = Role::create(['name' => 'user']);
        $privetuserRole = Role::create(['name' => 'Privetuser']);

        // إنشاء الصلاحيات
        $editPermission = Permission::create(['name' => 'trip.create']);
        $viewPermission = Permission::create(['name' => 'trip.list']);
        $updatPermission = Permission::create(['name' => 'trip.update']);
        $deletPermission = Permission::create(['name' => 'trip.delete']);

        // تعيين الصلاحيات للأدوار
        $privetuserRole->givePermissionTo($editPermission, $viewPermission, $updatPermission, $deletPermission);

        // تعيين دور للمستخدم
        $user->assignRole('admin');
    }
}
