<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->insert([
            'name' => 'Patrick Nieto Castro',
            'email' => 'patrick.nietocastro@sva.de',
            'password' => bcrypt('abeerinhandisworthabarrelinthebush')
        ]);
    }
}