<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Selim reza',
            'address' => 'Kollanpur, Dhaka',
            'phone' => '01623167740',
            'email' => 'selim.reza.dia@gmail.com',
            'password' => bcrypt('12345'),
            'role' => 'admin',
        ]);
    }
}
