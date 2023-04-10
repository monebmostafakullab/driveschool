<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VInsuranceTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('v_insurance_types')->insert([
            'v_insurance_type' => 'ألزامي',
        ]);
        DB::table('v_insurance_types')->insert([
            'v_insurance_type' => 'شامل',
        ]);
        DB::table('v_insurance_types')->insert([
            'v_insurance_type' => 'طرف ثالث',
        ]);
        DB::table('v_insurance_types')->insert([
            'v_insurance_type' => 'VIP',
        ]);
    }
}
