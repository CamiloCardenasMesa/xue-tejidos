<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call(PostSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(ForumCategorySeeder::class);
        $this->call(ReplySeeder::class);
        $this->call(ColorsSeeder::class);
        $this->call(ColorProductSeeder::class);
    }
}
