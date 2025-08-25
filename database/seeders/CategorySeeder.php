<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Electrician',
                'slug' => 'electrician',
                'description' => 'All electrical services including installations and repairs.',
                // 'is_active' => 'active',
                'avatar' => 'assets/admin/img/categories/electrician.png',
            ],
            [
                'name' => 'Plumbing',
                'slug' => 'plumbing',
                'description' => 'Professional plumbing services for residential and commercial.',
                // 'is_active' => "active",
                'avatar' => 'assets/admin/img/categories/plumbing.png',
            ],
            [
                'name' => 'House Cleaning',
                'slug' => 'house-cleaning',
                'description' => 'Reliable house cleaning and maintenance services.',
                // 'is_active' => 'active',
                'avatar' => 'assets/admin/img/categories/house_cleaning.png',
            ],
            [
                'name' => 'House Repair',
                'slug' => 'house-repair',
                'description' => 'General house repair and handyman services.',
                // 'is_active' => 'active',
                'avatar' => 'assets/admin/img/categories/house_repair.png',
            ],
        ];

        foreach ($categories as $category) {
            // You can use updateOrCreate if you want to avoid duplicates on seeding
            Category::updateOrCreate(
                ['slug' => $category['slug']],
                $category
            );
        }
    }
}
