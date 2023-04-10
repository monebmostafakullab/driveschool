<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContractTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contract_types')->insert([
            'contract_name' => 'دروس'
        ]);
        DB::table('contract_types')->insert([
            'contract_name' => 'مقاولة'
        ]);
    }
}
