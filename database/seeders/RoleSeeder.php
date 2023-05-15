<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Super Admin
        $role = Role::create([
            'name' => 'super-admin',
            'guard_name' =>  'web'
        ]);
        $role->givePermissionTo(Permission::all());

        // Admin Simple
        $role = Role::create([
            'name' => 'admin',
            'guard_name' =>  'web'
        ]);
        $role->givePermissionTo(Permission::all());
        // $role->revokePermissionTo('manage administrators');


        // content editor
        // $role = Role::create([
        //     'name' => 'content-editor',
        //     'guard_name' =>  'web'
        // ]);
        // $role->givePermissionTo('manage content', 'create content', 'display content', 'edit content', 'create content');

        // // email editor
        // $role = Role::create([
        //     'name' => 'email-editor',
        //     'guard_name' =>  'web'
        // ]);
        // $role->givePermissionTo('manage email', 'create email', 'display email', 'edit email', 'create email');
        
        //   engineer
        $role = Role::create([
            'name' => 'engineer',
            'guard_name' =>  'web'
        ]);
        $role->givePermissionTo('manage review', 'display review', 'edit review', 'create review');
        



    }
}
