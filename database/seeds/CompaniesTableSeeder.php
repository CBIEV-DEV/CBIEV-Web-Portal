<?php

use Illuminate\Database\Seeder;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companies')->insert([
            [
                'company_name' => 'Tunku Abdul Rahman University College',
                'company_reg_no' => '1033820M',
            ],
        ]);
    }
}
