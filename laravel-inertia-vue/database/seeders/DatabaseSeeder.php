<?php

namespace Database\Seeders;

use App\Models\Chirp;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
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

        /** @var Collection<User> $users */
        $users = User::factory(20)->create();

        \App\Models\Chirp::factory(100)->recycle($users)->create()->each(
            fn (Chirp $chirp) => $chirp->likers()->saveMany($users->random(mt_rand(1, $users->count())))
        );
    }
}
