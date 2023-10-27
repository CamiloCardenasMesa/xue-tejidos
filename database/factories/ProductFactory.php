<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(3, true),
            'description' => $this->faker->paragraph(10, 10),
            'price' => $this->faker->randomNumber(6),
            'stock' => $this->faker->numberBetween(2, 10),
            'enable' => true,
            'category_id' => $this->faker->numberBetween(1,3),
            'image' => 'posts/'.$this->faker->image('public/storage/posts', 640, 480, null, false),
        ];
    }
}
