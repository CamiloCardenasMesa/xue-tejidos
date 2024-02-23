<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        Storage::deleteDirectory('profile-photos');
        Storage::makeDirectory('profile-photos');
        User::factory(100)->create();
    }
}
