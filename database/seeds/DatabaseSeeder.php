<?php

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
        $this->call(CenterFacultiesTableSeeder::class);
        $this->call(CenterHeadFacultyDeansTableSeeder::class);
        $this->call(ProgrammeTableSeeder::class);
        $this->call(ProjectCategoriesTableSeeder::class);
        $this->call(CBIEVStaffTableSeeder::class);
        $this->call(MentorTypesTableSeeder::class);
        $this->call(CompaniesTableSeeder::class);
        // $this->call(ProjectRegistrationSeeder::class);
        // $this->call(UsersTableSeeder::class);
    }
}
