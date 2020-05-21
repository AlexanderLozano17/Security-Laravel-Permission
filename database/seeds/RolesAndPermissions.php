<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissions extends Seeder
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
        Permission::create(['name' => 'create_user']);
        Permission::create(['name' => 'read_user']);
        Permission::create(['name' => 'update_user']);
        Permission::create(['name' => 'delete_user']);

        Permission::create(['name' => 'create_rol']);
        Permission::create(['name' => 'read_rol']);
        Permission::create(['name' => 'update_rol']);
        Permission::create(['name' => 'delete_rol']);

        Permission::create(['name' => 'create_permission']);
        Permission::create(['name' => 'read_permission']);
        Permission::create(['name' => 'update_permission']);
        Permission::create(['name' => 'delete_permission']);

        // create roles and assign created permissions

        // this can be done as separate statements
        $role = Role::create(['name' => 'editor']);
        $role->givePermissionTo('read_user');
        $role->givePermissionTo('update_user');

        // or may be done by chaining
        $role = Role::create(['name' => 'moderator']);
        $role->givePermissionTo(['name' => 'create_user']);
        $role->givePermissionTo(['name' => 'read_user']);
        $role->givePermissionTo(['name' => 'update_user']);
        $role->givePermissionTo(['name' => 'delete_user']);

        $role = Role::create(['name' => 'super-admin']);
        $role->givePermissionTo(Permission::all());
    }
}
