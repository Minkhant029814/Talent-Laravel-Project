<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Events\PermissionDetached;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create Roles
        $admin =Role::firstOrCreate(['name' => 'admin']);
        $guest =Role::firstOrCreate(['name' => 'guest']); // Corrected spelling

        // Create Permissions
        $categoryList = Permission::firstOrCreate(['name' => 'categoryList']);
        $categoryCreate = Permission::firstOrCreate(['name' => 'categoryCreate']);
        $categoryUpdate = Permission::firstOrCreate(['name' => 'categoryUpdate']);
        $categoryEdit = Permission::firstOrCreate(['name' => 'categoryEdit']);
        $categoryDelete = Permission::firstOrCreate(['name' => 'categoryDelete']);

        $productCreate = Permission::firstOrCreate(['name' => 'productCreate']);
        $productShow = Permission::firstOrCreate(['name' => 'productShow']);
        $productDelete = Permission::firstOrCreate(['name'=> 'productDelete']);
        $productEdit = Permission::firstOrCreate(['name'=>'productEdit']);

        $userCreate = Permission::firstOrCreate(['name'=>'userCreate']);
        $userDelete = Permission::firstOrCreate(['name'=>'userDelete']);
        $userEdit = Permission::firstOrCreate(['name'=>'userEdit']);
        $userShow = Permission::firstOrCreate(['name'=>'userShow']);



        // Assign Permissions to Admin
        $admin->givePermissionTo([
            $categoryCreate,
            $categoryDelete,
            $categoryUpdate,
            $categoryList,
            $categoryEdit,
            $productCreate,
            $productDelete,
            $productEdit,
            $userCreate,
            $userDelete,
            $userEdit,
            $userShow

             // Merged into one call
        ]);

        // Assign Permissions to Guest
        $guest->givePermissionTo([
            $categoryList,
            $productShow
        ]);
    }
}
