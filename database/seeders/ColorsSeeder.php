<?php

namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Database\Seeder;

class ColorsSeeder extends Seeder
{
    public function run(): void
    {
        Color::factory(10)->create();
    }
}
