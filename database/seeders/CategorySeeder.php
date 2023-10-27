<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::factory()
        ->create([
            'name' => trans('categories.woman'),
        ]);

        Category::factory()

        ->create([
            'name' => trans('categories.man'),
        ]);

        Category::factory()
        ->create([
            'name' => trans('categories.kids'),
        ]);
    }
}
