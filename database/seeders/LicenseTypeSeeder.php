<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LicenseTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('license_types')->insert([
            'license_name' => 'ملاكي'
        ]);
        DB::table('license_types')->insert([
            'license_name' => 'تجاري'
        ]);
    }
}
