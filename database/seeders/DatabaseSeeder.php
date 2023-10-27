<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Storage::deleteDirectory('public/posts');
        Storage::makeDirectory('public/posts');

        \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Camilo Mesa',
            'email' => 'camilo@xue-tejidos.com',
        ]);

        Post::factory(10)->create();
    }
}
