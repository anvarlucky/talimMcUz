<?php

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
            'name' =>   'Admin1',
            'f_name' => 'Adminjon',
            's_name' => 'Adminov',
            'l_name' => 'Adminovich',
            'email' => 'admin11@test.test',
            'password' => Hash::make('12345678'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
