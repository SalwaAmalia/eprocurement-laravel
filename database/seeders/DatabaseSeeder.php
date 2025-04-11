<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Product;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        \App\Models\User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
            'is_approved' => true
        ]);

        \App\Models\User::create([
            'name' => 'Vendor User',
            'email' => 'vendor@example.com',
            'password' => bcrypt('password'),
            'role' => 'vendor',
            'is_approved' => true
        ]);

        \App\Models\User::create([
            'name' => 'Buyer User',
            'email' => 'buyer@example.com',
            'password' => bcrypt('password'),
            'role' => 'buyer',
            'is_approved' => true
        ]);
    }

}

