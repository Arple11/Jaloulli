<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Order;
use App\Models\Role;
use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Seeder;
use phpDocumentor\Reflection\Types\Void_;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run():void
    {
        $this->call(PermissionSeeder::class);
    }
}
