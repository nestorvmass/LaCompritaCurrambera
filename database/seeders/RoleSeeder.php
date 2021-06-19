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
        //

        $admin = Role::create(['name'=> 'Admin']);
        $support = Role::create(['name'=> 'Support']);
        $per1 = Permission::create(['name'=> 'admin.index' ])->syncRoles([$admin, $support]);
        $per2 = Permission::create(['name'=> 'admin.edit' ])->syncRoles([$admin]);;
        $per3 = Permission::create(['name'=> 'editar' ])->syncRoles([$admin]);;
    }
}
