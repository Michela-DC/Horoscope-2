<?php

use Illuminate\Database\Seeder;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Michela',
            'email' => 'michela@gmail.com',
            'password' => Hash::make('ciaociao')
        ]);
    }
}
