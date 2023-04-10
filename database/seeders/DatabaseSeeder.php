<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            RegionSeeder::class,
            SchoolSeeder::class,
            CitySeeder::class,
            GenderSeeder::class,
            LicenseTypeSeeder::class,
            CheckTypeSeeder::class,
            sign_check_typesSeeder::class,
            ContractTypeSeeder::class,
            StudentStatusSeeder::class,
            EmplCategorySeeder::class,
            GradeSeeder::class,
            TrainingTypeSeeder::class,
            VehicleCategorySeeder::class,
            VInsuranceTypeSeeder::class,
        ]);
    }
}
