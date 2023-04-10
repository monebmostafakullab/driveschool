<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Sign_check_typesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sign_check_types')->insert([
            'sign_check_name' => 'تحريري'
        ]);
        DB::table('sign_check_types')->insert([
            'sign_check_name' => 'شفوي'
        ]);
    }
}
