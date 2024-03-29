<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

use App\Models\Customers;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;



class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /*Disable foreign key constraints for users and enable it again.*/
        Schema::disableForeignKeyConstraints();
    
        Customers::truncate();
        Role::truncate();
        Permission::truncate();

        Schema::enableForeignKeyConstraints();

        
        \App\Models\Admin::factory()->create();

        $super_admin_role = Role::create(['name' => 'super_admin']);
        $admin_role = Role::create(['name' => 'admin']);
        $writer_role = Role::create(['name' => 'writer']);

        $Post_access_permission = Permission::create(['name' => 'Post access']);
        $Post_edit_permission = Permission::create(['name' => 'Post edit']);
        $Post_create_permission = Permission::create(['name' => 'Post create']);
        $Post_delete_permission = Permission::create(['name' => 'Post delete']);
        $Post_view_permission = Permission::create(['name' => 'Post view']);
        $Post_status_permission = Permission::create(['name' => 'Post status']);

        $Role_access_permission = Permission::create(['name' => 'Role access']);
        $Role_edit_permission = Permission::create(['name' => 'Role edit']);
        $Role_create_permission = Permission::create(['name' => 'Role create']);
        $Role_delete_permission = Permission::create(['name' => 'Role delete']);
        $Role_view_permission = Permission::create(['name' => 'Role view']);
        $Role_status_permission = Permission::create(['name' => 'Role status']);

        $User_access_permission = Permission::create(['name' => 'User access']);
        $User_edit_permission = Permission::create(['name' => 'User edit']);
        $User_create_permission = Permission::create(['name' => 'User create']);
        $User_delete_permission = Permission::create(['name' => 'User delete']);
        $User_view_permission = Permission::create(['name' => 'User view']);
        $User_status_permission = Permission::create(['name' => 'User status']);

        $Permission_access_permission = Permission::create(['name' => 'Permission access']);
        $Permission_edit_permission = Permission::create(['name' => 'Permission edit']);
        $Permission_create_permission = Permission::create(['name' => 'Permission create']);
        $Permission_delete_permission = Permission::create(['name' => 'Permission delete']);
        $Permission_view_permission = Permission::create(['name' => 'Permission view']);
        $Permission_status_permission = Permission::create(['name' => 'Permission status']);

        $Mail_access_permission = Permission::create(['name' => 'Mail access']);
        $Mail_edit_permission = Permission::create(['name' => 'Mail edit']);
        $Mail_create_permission = Permission::create(['name' => 'Mail create']);
        $Mail_delete_permission = Permission::create(['name' => 'Mail delete']);
        $Mail_view_permission = Permission::create(['name' => 'Mail view']);
        $Mail_status_permission = Permission::create(['name' => 'Mail status']);

        $super_admin_role->givePermissionTo(Permission::all());
        
        $admin_role->syncPermissions([$Post_access_permission, $Post_edit_permission, $Post_create_permission, $Post_delete_permission, $Post_view_permission, $Post_status_permission, $User_access_permission, $User_edit_permission, $User_create_permission, $User_delete_permission, $User_view_permission, $User_status_permission, $Mail_access_permission, $Mail_edit_permission, $Mail_create_permission, $Mail_delete_permission, $Mail_view_permission, $Mail_status_permission]);

        $writer_role->syncPermissions([$Post_access_permission, $Post_edit_permission, $Post_create_permission, $Post_delete_permission, $Post_view_permission, $Post_status_permission]);

        $superadmin = User::create([
            'name'=>'Super Admin',
            'email'=>'super_admin@admin.com',
            'password'=>bcrypt('password'),
        ]);

        $admin = User::create([
            'name'=>'Admin',
            'email'=>'admin@admin.com',
            'password'=>bcrypt('password'),
        ]);

        $writer = User::create([
            'name'=>'writer',
            'email'=>'writer@writer.com',
            'password'=>bcrypt('password')
        ]);

        $superadmin->assignRole($super_admin_role);
        $admin->assignRole($admin_role);
        $writer->assignRole($writer_role);

        \App\Models\Customers::factory(10)->create();
        /*\App\Models\Cwdregistration::factory(50)->create();*/
    }
}
