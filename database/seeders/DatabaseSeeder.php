<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        User::create([
            'email' => 'admin@mail.com',
            'username' => 'admin',
            'password' => Hash::make('admin'),
            'role' => 'admin'
        ]);
        User::create([
            'email' => 'resepsionis@mail.com',
            'username' => 'resepsionis',
            'password' => Hash::make('resepsionis'),
            'role' => 'resepsionis'
        ]);
    }
}
