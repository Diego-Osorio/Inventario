<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Andres',
            'email' => 'andres.motiso1@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'), // password
            'address'=> 'Av. rediablo',
            'phone'=>'56967890986',
            'role'=>'admin',

        ]);

        User::factory()
            ->count(50)
            ->create();
    }
}
