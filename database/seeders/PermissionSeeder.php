<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(["name" => "IndexUser"]);
        Permission::create(["name" => "StoreUser"]);
        Permission::create(["name" => "UpdateUser"]);
        Permission::create(["name" => "ShowUser"]);
        Permission::create(["name" => "DestroyUser"]);

        Permission::create(["name" => "IndexProduct"]);
        Permission::create(["name" => "StoreProduct"]);
        Permission::create(["name" => "UpdateProduct"]);
        Permission::create(["name" => "ShowProduct"]);
        Permission::create(["name" => "DestroyProduct"]);

        Permission::create(["name" => "IndexOrder"]);
        Permission::create(["name" => "StoreOrder"]);
        Permission::create(["name" => "UpdateOrder"]);
        Permission::create(["name" => "ShowOrder"]);
        Permission::create(["name" => "DestroyOrder"]);

        Permission::create(["name" => "IndexCheck"]);
        Permission::create(["name" => "StoreCheck"]);
        Permission::create(["name" => "UpdateCheck"]);
        Permission::create(["name" => "ShowCheck"]);
        Permission::create(["name" => "DestroyCheck"]);

        Permission::create(["name" => "IndexOpportunity"]);
        Permission::create(["name" => "StoreOpportunity"]);
        Permission::create(["name" => "UpdateOpportunity"]);
        Permission::create(["name" => "ShowOpportunity"]);
        Permission::create(["name" => "DestroyOpportunity"]);

        $role = Role::create(['name' => 'SuperAdmin']);
        $role->givePermissionTo(["IndexUser", "StoreUser",  "UpdateUser", "ShowUser", "DestroyUser",
            "IndexProduct", "StoreProduct", "UpdateProduct", "ShowProduct", "DestroyProduct",
            "IndexOrder", "StoreOrder", "UpdateOrder", "ShowOrder", "DestroyOrder",
            "IndexCheck", "StoreCheck", "UpdateCheck", "ShowCheck", "DestroyCheck",
            "IndexOpportunity", "StoreOpportunity", "UpdateOpportunity", "ShowOpportunity", "DestroyOpportunity"]);
    }
}
