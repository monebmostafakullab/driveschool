<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            DB::table('schools')->insert([
                'school_name' => 'مدرسة التقدم',
                'region_id' =>1,
                'manager_name' => 'مدير مدرسة التقدم',
                'manager_mobile' => '0599736954' ,
                'contact_person' => 'تواصل مدرسة التقدم',            
                'contact_mobile' => '059989898',
            ]);
    }
}
