<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        // // 1. Create Admin User for managing requests
        // User::create([
        //     'name' => 'Campus Admin',
        //     'email' => 'admin@aiu.edu.kw',
        //     'password' => Hash::make('password'),
        //     'role' => 'admin',
        // ]);

        // // 2. Create Standard Requester User
        // User::create([
        //     'name' => 'Yosry Developer',
        //     'email' => 'yosry@aiu.edu.kw',
        //     'password' => Hash::make('password'),
        //     'role' => 'requester',
        // ]);

        // Create Admin Account
        User::firstOrCreate(
            ['email' => 'admin@aiu.edu.kw'],
            [
                'name' => 'Campus Admin',
                'password' => Hash::make('password'),
                'role' => 'admin',
            ]
        );

        // Create Student Account
        User::firstOrCreate(
            ['email' => 'yosry@aiu.edu.kw'],
            [
                'name' => 'Yosry Developer',
                'password' => Hash::make('password'),
                'role' => 'student',
            ]
        );

        // 3. Create Default Campus Categories
        Category::create([
            'name' => 'IT Hardware Support',
            'description' => 'Requests for laptops, projectors, and classroom network setups.'
        ]);

        Category::create([
            'name' => 'Lab Booking',
            'description' => 'Reserving computer engineering labs or specialized hardware stations.'
        ]);

        Category::create([
            'name' => 'Software License',
            'description' => 'Requests for developer tools, IDE licenses, or educational software.'
        ]);
    }
}
