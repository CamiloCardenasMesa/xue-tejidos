<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        Storage::deleteDirectory('public/posts');
        Storage::makeDirectory('public/posts');
        Post::factory(100)->create();
    }
}
