<?php

use Illuminate\Database\Seeder;

class ProjectRegistrationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('project_members')->insert(
            [
                'member_type' => 1,
                'name' => 'Andrew Tan Yong Nian',
                'ic' => 'N/A',
                'contact' => '016-4141995',
                'email' => 'Andrewtanyongnian@gmail.com',
                'company_id' => 1,
                'company_email' => 'N/A',
                'position' => 'Student',
                'uc_id' => 'N/A',
                'center_faculty_id' => 17,
                'programme_study' => 1,
                'is_active' => 1,
            ]
        );
        // DB::table('project_members')->insert(
        //         ['member_type' => '',
        //         'name' => '',
        //         'ic' => '',
        //         'contact' => '',
        //         'email' => '',
        //         'company_id' => '',
        //         'company_email' => '',
        //         'position' => '',
        //         'uc_id' => '',
        //         'center_faculty_id' => '',
        //         'programme_study' => '',
        //         'is_active' => '',]
        // );
        
        // DB::table('project_supervisors')->insert(
        //     [
        //         'member_type' => '',
        //         'name' => '',
        //         'ic' => '',
        //         'contact' => '',
        //         'email' => '',
        //         'company_id' => '',
        //         'company_email' => '',
        //         'position' => '',
        //         'uc_id' => '',
        //         'center_faculty_id' => '',
        //         'is_active' => '',
        //     ]
        // );
        // DB::table('project_supervisor_list')->insert(
        //     [
        //         'project_id' => '',
        //         'project_supervisor_id' => '',
        //     
        // );
        DB::table('project_registrations')->insert(
            [
                'project_title' => 'Queue, Dine-in, Payment',
                'problem_statement' => 'N/A',
                'product_solution' => 'Service platform for F&B industry',
                'target_market' => 'N/A',
                'category_id' => 1,
                'team_leader' => 1,
            ]
        );

        DB::table('pr_member_list')->insert(
            [
                'project_registration_id' => 1,
                'project_member_id' => 1,
            ]
        );
        
    }
}
