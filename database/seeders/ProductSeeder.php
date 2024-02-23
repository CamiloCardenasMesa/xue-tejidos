<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $directory = 'images/products';

        if (Storage::exists($directory)) {
            Storage::deleteDirectory($directory);
        }

        Storage::makeDirectory($directory);

        Product::factory(100)->create();
    }
}
