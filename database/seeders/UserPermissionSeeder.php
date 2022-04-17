<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class UserPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $permissions = [
            'user_management_access',
            'permission_create',
            'permission_edit',
            'permission_show',
            'permission_delete',
            'permission_access',
            'role_create',
            'role_edit',
            'role_show',
            'roole_delete',
            'role_access',
            'user_create',
            'user_edit',
            'user_show',
            'user_delete',
            'user_access',
            'comment_create',
            'comment_edit',
            'comment_show',
            'comment_delete',
            'comment_own_edit',
            'comment_own_delete'
        ];

        foreach($permissions as $permission){
            Permission::create([
                'name' => $permission
            ]);
        }

        Role::create(['name' => 'Super Admin']);

        $role = Role::create(['name' => 'User']);

        $userPermissions = [
            'comment_own_edit',
            'comment_own_delete',
            'comment_show',
            'comment_create',
        ];

        foreach($userPermissions as $permission) {
            $role->givePermissionTO($permission);
        }
    }
}
