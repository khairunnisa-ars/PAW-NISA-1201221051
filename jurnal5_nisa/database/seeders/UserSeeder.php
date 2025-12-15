<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create admin user
        User::create([
            'name' => 'Admin EAD',
            'email' => 'admin@ead.ac.id',
            'password' => Hash::make('password'),
        ]);

        // Create test user
        User::create([
            'name' => 'User Test',
            'email' => 'user@ead.ac.id',
            'password' => Hash::make('password'),
        ]);

        // Create additional test users
        User::create([
            'name' => 'Dosen EAD',
            'email' => 'dosen@ead.ac.id',
            'password' => Hash::make('password'),
        ]);
    }
}
