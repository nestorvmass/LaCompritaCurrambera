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
        $vendedor = Role::create(['name'=> 'Vendedor']);

        // Permisos administradores
        $per1 = Permission::create(['name'=> 'admin.index' ])->syncRoles([$admin, $support]);
        $per2 = Permission::create(['name'=> 'admin.edit' ])->syncRoles([$admin]);
        $per3 = Permission::create(['name'=> 'admin.create' ])->syncRoles([$admin]);


        // Listado de opciones
        $per3 = Permission::create(['name'=> 'editar' ])->syncRoles([$admin, $support]);
        $per4 = Permission::create(['name'=> 'eliminar' ])->syncRoles([$admin]);

        // productos 
        $per5 = Permission::create(['name' => 'crear'])->syncRoles([$vendedor]);
        $per5 = Permission::create(['name' => 'opciones_vendedor'])->syncRoles([$vendedor]);
        $per5 = Permission::create(['name' => 'producto.create'])->syncRoles([$vendedor]);
    }
}
