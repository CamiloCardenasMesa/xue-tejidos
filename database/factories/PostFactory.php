<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class PostFactory extends Factory
{
    public function definition(): array
    {
        $postImage = storage_path('app/public/images/post_image.jpg');

        return [
            'user_id' => rand(1, 10),
            'title' => $this->faker->sentence(),
            'slug' => $this->faker->slug(),
            'content' => $this->faker->text(),
            'image' => $postImage ? Storage::disk('public')->putFile('posts', new File($postImage)) : null,
        ];
    }
}
