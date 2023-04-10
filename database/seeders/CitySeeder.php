<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->insert([
            'region_id' => 1,
            'city_name' => 'خانيونس'
        ]);
        DB::table('cities')->insert([
            'region_id' => 1,
            'city_name' => 'رفح'
        ]);
        DB::table('cities')->insert([
            'region_id' => 2,
            'city_name' => 'الخليل'
        ]);
        DB::table('cities')->insert([
            'region_id' => 2,
            'city_name' => 'جنين'
        ]);
    }
}
