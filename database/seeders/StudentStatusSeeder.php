<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('student_status')->insert([
            'st_status_name' => 'طالب جديد'
        ]);
        DB::table('student_status')->insert([
            'st_status_name' => 'تحت التدريب العملي'
        ]);
        DB::table('student_status')->insert([
            'st_status_name' => 'ناجح'
        ]);
    }
}
