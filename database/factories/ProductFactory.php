<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'sku' => $this->faker->unique()->randomNumber(),
            'barcode' => $this->faker->ean13,
            'description' => $this->faker->paragraph,
            'price' => $this->faker->randomFloat(2, 1, 1000),
            'discount_price' => $this->faker->randomFloat(2, 0, 1000),
            'capacity' => $this->faker->randomNumber(1),
            'unit' => $this->faker->randomElement(['kg', 'lb']),
            'package_count' => $this->faker->randomNumber(2),
            'available_qty' => $this->faker->randomNumber(),
            'featured' => $this->faker->boolean,
            'deliverable' => $this->faker->boolean,
            'is_active' => $this->faker->boolean,
            'plus_option' => $this->faker->boolean,
            'digital' => $this->faker->boolean,
            'vendor_id' => null,
            'in_order' => $this->faker->randomNumber(),
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'deleted_at' => null,
            'photo' => $this->faker->image('public/proimg', 400, 300, null, false),
        ];
    }
}
