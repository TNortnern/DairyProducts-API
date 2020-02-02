<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class SizesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 15; $i++) {
            DB::table('sizes')->insert([
                'size' => Str::random(rand(0, 2)) . '*' . Str::random(rand(0, 2)) . '*' . Str::random(rand(0, 2))
            ]);
        }
    }
}
