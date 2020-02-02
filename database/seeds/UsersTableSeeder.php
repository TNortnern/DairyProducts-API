<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('users')->insert([
               'name' => 'ADMIN',
               'email' => 'admin@admin.com',
               'password' => Hash::make('password'),
               'is_authorized' => 1,
               'auth_lvl' => 3
           ]);
        for ($i = 0; $i < 49; $i++) {
            DB::table('users')->insert([
               'name' => Str::random(10),
               'email' => Str::random(10).'@gmail.com',
               'password' => Hash::make('password'),
               'is_authorized' => rand(0, 1),
               'auth_lvl' => rand(0, 2)
           ]);
        }

    }
}
