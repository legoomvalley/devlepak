<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleandPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'manage coffee']);
        Permission::create(['name' => 'manage brewing']);
        Permission::create(['name' => 'manage user']);

        //create role and assign
        Role::create(['name' => 'admin'])
            ->givePermissionTo(Permission::all());

        Role::create(['name' => 'supervisor'])
            ->givePermissionTo(['manage coffee', 'manage brewing']);
    }
}
