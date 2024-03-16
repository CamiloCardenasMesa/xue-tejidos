<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory; 
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        $productImage1 = storage_path('app/public/images/product_image.jpg');
        $productImage2 = storage_path('app/public/images/product_image2.jpg');
        
        $directory = 'images/products';

        if ($productImage1) {
            $path1 = Storage::disk('public')->putFile($directory, new File($productImage1));
            $images[] = $path1; 
        }

        if ($productImage2) {
            $path2 = Storage::disk('public')->putFile($directory, new File($productImage2));
            $images[] = $path2; 
        }

        return [
            'name' => $this->faker->sentence(3, true),
            'description' => $this->faker->paragraph(10, 10),
            'price' => $this->faker->randomNumber(6),
            'stock' => $this->faker->numberBetween(2, 10),
            'status' => true,
            'category_id' => $this->faker->numberBetween(1, 3),
            'images' => json_encode($images),
        ];
    }
}
