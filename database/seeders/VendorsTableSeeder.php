<?php

use Illuminate\Database\Seeder;
use App\Models\Vendor;
use Faker\Factory as Faker;

class VendorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Create dummy vendors
        for ($i = 1; $i <= 10; $i++) {
            Vendor::create([
                'name' => $faker->company,
                'description' => $faker->paragraph,
                'base_delivery_fee' => $faker->randomFloat(2, 0, 100),
                'delivery_fee' => $faker->randomFloat(2, 0, 100),
                'delivery_range' => $faker->randomFloat(2, 0, 20),
                'tax' => $faker->randomElement([$faker->numberBetween(1, 10), null]),
                'phone' => $faker->phoneNumber,
                'email' => $faker->email,
                'address' => $faker->address,
                'latitude' => $faker->latitude,
                'longitude' => $faker->longitude,
                'commission' => $faker->randomFloat(2, 0, 50),
                'pickup' => $faker->boolean,
                'delivery' => $faker->boolean,
                'is_active' => $faker->boolean,
                'charge_per_km' => $faker->boolean,
                'is_open' => $faker->boolean,
                'vendor_type_id' => $faker->numberBetween(1, 5),
                'auto_assignment' => $faker->boolean,
                'auto_accept' => $faker->boolean,
                'allow_schedule_order' => $faker->boolean,
                'has_sub_categories' => $faker->boolean,
                'min_order' => $faker->randomFloat(2, 0, 100),
                'max_order' => $faker->randomFloat(2, 100, 500),
                'use_subscription' => $faker->boolean,
                'has_drivers' => $faker->boolean,
                'prepare_time' => $faker->time('H:i:s'),
                'delivery_time' => $faker->time('H:i:s'),
                'in_order' => $faker->numberBetween(1, 10),
            ]);
        }
    }
}
