<?php

namespace Database\Seeders;

use App\Models\Service;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {


        $this->call([
            CategorySeeder::class,
            UserSeeder::class,
            RolePermissionSeeder::class,
            AdminSeeder::class,
            ServiceSeeder::class,
        ]);
    }
}
