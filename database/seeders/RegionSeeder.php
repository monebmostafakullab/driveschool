<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('regions')->insert([
            'region_name' => 'غزة'
        ]);
        DB::table('regions')->insert([
            'region_name' => 'الضفة الغربية'
        ]);
    }
}
