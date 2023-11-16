<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class PostFactory extends Factory
{
    public function definition(): array
    {
        $profileImage = storage_path('app/public/images/post_image.jpg');

        return [
            'title' => $this->faker->sentence(),
            'content' => $this->faker->text(),
            'image' => $profileImage ? Storage::disk('public')->putFile('posts', new File($profileImage)) : null,
        ];
    }
}
