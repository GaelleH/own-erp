<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::insert([
            'name' => 'Gaelle Hardy',
            'email' => 'gaelle_hardy1@hotmail.com',
            'password' => bcrypt('Dutsvandezee94')
        ]);
    }
}
