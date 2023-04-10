<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CheckTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Check_types')->insert([
            'check_name' => 'عادي'
        ]);
        DB::table('Check_types')->insert([
            'check_name' => 'سيطرة'
        ]);
    }
}
