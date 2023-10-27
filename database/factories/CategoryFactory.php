<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'image' => 'posts/'.$this->faker->image('public/storage/posts', 640, 480, null, false),
        ];
    }
}
