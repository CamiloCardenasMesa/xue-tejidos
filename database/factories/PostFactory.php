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
            'title' => $this->faker->sentence(),
            'content' => $this->faker->text(),
            'image' => $postImage ? Storage::disk('public')->putFile('images/posts', new File($postImage)) : null,
        ];
    }
}
