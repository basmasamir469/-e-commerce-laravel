<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

         $admin=Admin::create([
             'name' => 'admin',
             'email' => 'admin@admin.com',
             'phone_number'=>'0123456789',
             'password'=>Hash::make('123456')
         ]);
         $admin->addMedia('public/avatar2.png')
         ->toMediaCollection('admin_images');


         $this->call(CategorySeeder::class);
         $this->call(ProductSeeder::class);
    }
}
