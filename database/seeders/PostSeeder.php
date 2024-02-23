<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        $directory = 'images/posts';

        if (Storage::exists($directory)) {
            Storage::deleteDirectory($directory);
        }

        Storage::makeDirectory($directory);

        Post::factory(100)->create();
    }
}
