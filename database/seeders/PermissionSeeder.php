<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Artisan;


class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Artisan::call('cache:clear');
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        // 'guard_name' =>  'admin'


        Permission::create(['name' => 'manage users', 'guard_name' =>  'web']);

        // Permission::create(['name' => 'manage administrators', 'guard_name' =>  'web']);
        // Permission::create(['name' => 'create administrators', 'guard_name' =>  'web']);
        // Permission::create(['name' => 'display administrators', 'guard_name' =>  'web']);
        // Permission::create(['name' => 'edit administrators', 'guard_name' =>  'web']);
        // Permission::create(['name' => 'delete administrators', 'guard_name' =>  'web']);

        // ..
        Permission::create(['name' => 'manage roles', 'guard_name' =>  'web']);
        Permission::create(['name' => 'create roles', 'guard_name' =>  'web']);
        Permission::create(['name' => 'display roles', 'guard_name' =>  'web']);
        Permission::create(['name' => 'edit roles', 'guard_name' =>  'web']);
        Permission::create(['name' => 'delete roles', 'guard_name' =>  'web']);

        // ..
        Permission::create(['name' => 'manage user', 'guard_name' =>  'web']);
        Permission::create(['name' => 'create user', 'guard_name' =>  'web']);
        Permission::create(['name' => 'display user', 'guard_name' =>  'web']);
        Permission::create(['name' => 'edit user', 'guard_name' =>  'web']);
        Permission::create(['name' => 'delete user', 'guard_name' =>  'web']);


        Permission::create(['name' => 'manage building', 'guard_name' =>  'web']);
        Permission::create(['name' => 'create building', 'guard_name' =>  'web']);
        Permission::create(['name' => 'display building', 'guard_name' =>  'web']);
        Permission::create(['name' => 'edit building', 'guard_name' =>  'web']);
        Permission::create(['name' => 'delete building', 'guard_name' =>  'web']);

        // ..
        Permission::create(['name' => 'manage review', 'guard_name' =>  'web']);
        Permission::create(['name' => 'create review', 'guard_name' =>  'web']);
        Permission::create(['name' => 'display review', 'guard_name' =>  'web']);
        Permission::create(['name' => 'edit review', 'guard_name' =>  'web']);
        Permission::create(['name' => 'delete review', 'guard_name' =>  'web']);

        Permission::create(['name' => 'manage item', 'guard_name' =>  'web']);
        Permission::create(['name' => 'create item', 'guard_name' =>  'web']);
        Permission::create(['name' => 'display item', 'guard_name' =>  'web']);
        Permission::create(['name' => 'edit item', 'guard_name' =>  'web']);
        Permission::create(['name' => 'delete item', 'guard_name' =>  'web']);
    }
}
