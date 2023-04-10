<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VehicleCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vehicle_categories')->insert([
            'v_cat_name' => 'ملاكي',
        ]);
        DB::table('vehicle_categories')->insert([
            'v_cat_name' => 'تجاري',
        ]);
        DB::table('vehicle_categories')->insert([
            'v_cat_name' => 'ملاكي اوتوماتيك',
        ]);
        DB::table('vehicle_categories')->insert([
            'v_cat_name' => 'اوتوبيس',
        ]);
        DB::table('vehicle_categories')->insert([
            'v_cat_name' => 'تاكسي',
        ]);
        DB::table('vehicle_categories')->insert([
            'v_cat_name' => 'حمولة',
        ]);
        DB::table('vehicle_categories')->insert([
            'v_cat_name' => 'مقطورة',
        ]);
        DB::table('vehicle_categories')->insert([
            'v_cat_name' => 'دراجة نارية',
        ]);
        DB::table('vehicle_categories')->insert([
            'v_cat_name' => 'تكتك',
        ]);
    }
}
