<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $adminData = [
            'name' => 'Camilo',
            'email' => 'camilomesadev@gmail.com',
            'password' => bcrypt('password'),
            'phone' => '3194317137',
            'address' => '',
            'city' => 'Medellín',
            'country' => 'Colombia',
        ];

        User::create($adminData);

        $profilePhotoDirectory = 'images/profile-photos';

        if (Storage::exists($profilePhotoDirectory)) {
            Storage::deleteDirectory($profilePhotoDirectory);
        }

        Storage::makeDirectory($profilePhotoDirectory);
        User::factory(100)->create();
    }
}
