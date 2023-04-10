<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('grades')->insert([
            'grade_name' => '1',
        ]);
        DB::table('grades')->insert([
            'grade_name' => '2',
        ]);
        DB::table('grades')->insert([
            'grade_name' => '3',
        ]);
        DB::table('grades')->insert([
            'grade_name' => '10',
        ]);
    }
}
