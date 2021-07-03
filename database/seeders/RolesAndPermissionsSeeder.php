<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $systemPermission = [
            ['name' => 'view admin'],
            ['name' => 'create admin'],
            ['name' => 'edit admin'],
            ['name' => 'delete admin'],
            ['name' => 'view company'],
            ['name' => 'create company'],
            ['name' => 'edit company'],
            ['name' => 'delete company'],
            ['name' => 'view employee'],
            ['name' => 'create employee'],
            ['name' => 'edit employee'],
            ['name' => 'delete employee'],
            ['name' => 'view role'],
            ['name' => 'create role'],
            ['name' => 'edit role'],
            ['name' => 'delete role']
          
        ];
        foreach($systemPermission as $permission){
            Permission::create($permission);
        }

        // create roles and assign created permissions

        // this can be done as separate statements
        $role = Role::create(['name' => 'super admin']);
        $role->givePermissionTo(Permission::all());
    }
}
