<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Storage::deleteDirectory('public/products');
        Storage::makeDirectory('public/products');
        Product::factory(100)->create();
    }
}
