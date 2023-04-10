<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TrainingTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('training_types')->insert([
            'training_type_name' => 'ملاكي',
        ]);
        DB::table('training_types')->insert([
            'training_type_name' => 'تجاري',
        ]);
        DB::table('training_types')->insert([
            'training_type_name' => 'اوتوبيس',
        ]);
        DB::table('training_types')->insert([
            'training_type_name' => 'حمولة',
        ]);
        DB::table('training_types')->insert([
            'training_type_name' => 'مقطورة',
        ]);
        DB::table('training_types')->insert([
            'training_type_name' => 'دراجة نارية',
        ]);
        DB::table('training_types')->insert([
            'training_type_name' => 'نركتور',
        ]);
        DB::table('training_types')->insert([
            'training_type_name' => 'تاكسي',
        ]);
        DB::table('training_types')->insert([
            'training_type_name' => 'تكتك',
        ]);
    }
}
