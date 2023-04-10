<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmplCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('empl_categories')->insert([
            'category_name' => 'مدرب',
            'type'=>1,
        ]);
        DB::table('empl_categories')->insert([
            'category_name' => ' مدرب مهني',
            'type'=>1,
        ]);
        DB::table('empl_categories')->insert([
            'category_name' => 'اداري',
        ]);
        DB::table('empl_categories')->insert([
            'category_name' => 'مراسل'
        ]);
    }
}
