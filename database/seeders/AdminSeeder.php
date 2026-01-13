<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::create([
        'name' => 'Admin GD Coffee',
        'email' => 'admin@gdcoffee.test',
        'password' => bcrypt('admin123'),
        'role' => 'admin',
        ]);

        \App\Models\User::create([
            'name' => 'Superadmin GD Coffee',
            'email' => 'superadmin@gdcoffee.test',
            'password' => bcrypt('superadmin123'),
            'role' => 'superadmin',
        ]);
    }
}
