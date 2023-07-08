<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

         $admin=User::create([
             'name' => 'admin',
             'email' => 'admin@admin.com',
             'phone_number'=>'0123456789',
             'password'=>Hash::make('123456'),
             'is_admin'=>1
         ]);
         $path='public/dist/img/avatar4.png';
            $admin->addMedia($path)
            ->toMediaCollection('admin_images');
            $newPath=$admin->getFirstMedia('admin_images')->getPath();   
            File::copy($newPath,$path);

         $this->call(CategorySeeder::class);
         $this->call(ProductSeeder::class);
    }
}
