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
        $this->call([
            AdminSeeder::class,
            BannerSectionSeeder::class,
            BannerSeeder::class,
            CareerDepartment::class,
            ContactusDetailsSeeder::class,
            DetailsSeeder::class,
            EmployeeNoSeeder::class,
            DetailsSeeder::class,
            EmployeeSeeder::class,
            HomeSilder::class,
            MenuSeeder::class,
            Section2Seeder::class,
            SectiononeSeeder::class,
            SectiontwoSeeder::class,
            StatisticalSeeder::class,
            TopSectionSeeder::class,
        ]);
    }
}
