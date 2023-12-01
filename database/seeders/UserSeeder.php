<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        Storage::deleteDirectory('public/profile-photos');
        Storage::makeDirectory('public/profile-photos');
        User::factory(100)->create();
    }
}
