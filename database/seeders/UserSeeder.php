<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Ram Sharma',
            'email' => 'ram@gmail.com',
            'password' => bcrypt('12345678'),
            'country' => 'Nepal',
        ]);

        User::create([
            'name' => 'Shyam Sharma',
            'email' => 'shyam@gmail.com',
            'user_type' => 'vendor',
            'service_category_id' => 1,
            'vendor_verification' => true,
            'password' => bcrypt('12345678'),
            'country' => 'Nepal',
            'address' => 'Adarshnagar - 10, Birgunj - Parsa',
            'vendor_rating' => 4.5,
        ]);
        User::create([
            'name' => 'Hari Sharma',
            'email' => 'hari@gmail.com',
            'user_type' => 'vendor',
            'service_category_id' => 2,
            'vendor_verification' => true,
            'country' => 'Nepal',
            'password' => bcrypt('12345678'),
            'address' => 'Asok Vatika - 10, Birgunj - Parsa',
            'vendor_rating' => 2.5,
        ]);
    }
}
