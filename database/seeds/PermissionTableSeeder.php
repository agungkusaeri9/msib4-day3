<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create([
            'name' => 'dashboard'
        ]);
        Permission::create([
            'name' => 'profile-edit'
        ]);
        Permission::create([
            'name' => 'user-view'
        ]);
        Permission::create([
            'name' => 'user-create'
        ]);
        Permission::create([
            'name' => 'user-edit'
        ]);
        Permission::create([
            'name' => 'user-delete'
        ]);

        Permission::create([
            'name' => 'role-view'
        ]);
        Permission::create([
            'name' => 'role-create'
        ]);
        Permission::create([
            'name' => 'role-edit'
        ]);
        Permission::create([
            'name' => 'role-delete'
        ]);

        Permission::create([
            'name' => 'rolepermission-view'
        ]);
        Permission::create([
            'name' => 'rolepermission-update'
        ]);

        Permission::create([
            'name' => 'permission-view'
        ]);
        Permission::create([
            'name' => 'permission-create'
        ]);
        Permission::create([
            'name' => 'permission-edit'
        ]);
        Permission::create([
            'name' => 'permission-delete'
        ]);
    }
}
