<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Jeric June Logan',
            'username' => 'jericdei',
            'email' => 'loganjeric25@gmail.com',
            'password' => bcrypt('password')
        ]);

        $users = User::factory(20)->create();
        \App\Models\Chirp::factory(100)->recycle($users)->create();
    }
}
