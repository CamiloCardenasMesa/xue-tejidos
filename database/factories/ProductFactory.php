<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        $productImage = storage_path('app/public/images/product_image.png');

        return [
            'name' => $this->faker->sentence(3, true),
            'description' => $this->faker->paragraph(10, 10),
            'price' => $this->faker->randomNumber(6),
            'stock' => $this->faker->numberBetween(2, 10),
            'enable' => true,
            'category_id' => $this->faker->numberBetween(1, 3),
            'image' => $productImage ? Storage::disk('public')->putFile('products', new File($productImage)) : null,
        ];
    }
}
