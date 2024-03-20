<?php

namespace Database\Seeders;

use App\Models\Color;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ColorProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = Product::all();
        $colors = Color::all();

        foreach ($products as $product) {
            $product->colors()->attach(
                $colors->random(rand(1, 3))->pluck('id')->toArray()
            );
        }
    }
}
