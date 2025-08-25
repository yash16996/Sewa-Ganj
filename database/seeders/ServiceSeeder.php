<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;
use Illuminate\Support\Str;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        $services = [
            [
                'avatar' => null,
                'name' => 'Electrical Wiring Installation',
                'description' => 'Complete home and office electrical wiring installation services.',
                'category_id' => 1, // assign first category as example
                'service_charge' => 120.50,
                'status' => 'active',
                'vendor_id' => 2, // assign first vendor
            ],
            [
                'avatar' => null,
                'name' => 'Pipe Leak Repair',
                'description' => 'Reliable plumbing pipe leak repairs by certified professionals.',
                'category_id' => 2, // fallback to first if second missing
                'service_charge' => 80.00,
                'status' => 'active',
                'vendor_id' => 3,
            ],
            [
                'avatar' => null,
                'name' => 'Ceiling Fan Installation',
                'description' => 'Professional installation of ceiling fans for homes and offices.',
                'category_id' => 1,
                'service_charge' => 60.00,
                'status' => 'active',
                'vendor_id' => 2,
            ],
            [
                'avatar' => null,
                'name' => 'Circuit Breaker Replacement',
                'description' => 'Safe and efficient replacement of faulty circuit breakers.',
                'category_id' => 1,
                'service_charge' => 95.00,
                'status' => 'active',
                'vendor_id' => 2,
            ],
            [
                'avatar' => null,
                'name' => 'Water Heater Installation',
                'description' => 'Expert installation of electric and gas water heaters.',
                'category_id' => 2,
                'service_charge' => 150.00,
                'status' => 'active',
                'vendor_id' => 3,
            ],
            [
                'avatar' => null,
                'name' => 'Drain Cleaning',
                'description' => 'Fast and effective cleaning of clogged drains and pipes.',
                'category_id' => 2,
                'service_charge' => 70.00,
                'status' => 'active',
                'vendor_id' => 3,
            ],
            [
                'avatar' => null,
                'name' => 'Light Fixture Repair',
                'description' => 'Repair and maintenance of all types of light fixtures.',
                'category_id' => 1,
                'service_charge' => 50.00,
                'status' => 'active',
                'vendor_id' => 2,
            ],
            [
                'avatar' => null,
                'name' => 'Toilet Installation & Repair',
                'description' => 'Installation and repair services for all toilet models.',
                'category_id' => 2,
                'service_charge' => 85.00,
                'status' => 'active',
                'vendor_id' => 3,
            ],
            // [
            //     'avatar' => null,
            //     'name' => 'House Deep Cleaning',
            //     'description' => 'Thorough cleaning services for your home to make it shine.',
            //     'category_id' => $categoryIds[2] ?? $categoryIds[0],
            //     'service_charge' => 150.00,
            //     'status' => 'active',
            //     'vendor_id' => $vendorIds[2] ?? $vendorIds[0],
            // ],
            // [
            //     'avatar' => null,
            //     'name' => 'Furniture Repair and Maintenance',
            //     'description' => 'Expert furniture repair services to restore your valuables.',
            //     'category_id' => $categoryIds[3] ?? $categoryIds[0],
            //     'service_charge' => 90.75,
            //     'status' => 'inactive',
            //     'vendor_id' => $vendorIds[0],
            // ],
        ];

        foreach ($services as $service) {
            // Use updateOrCreate for idempotent seeding
            Service::updateOrCreate(
                ['name' => $service['name']],
                $service
            );
        }
    }
}
