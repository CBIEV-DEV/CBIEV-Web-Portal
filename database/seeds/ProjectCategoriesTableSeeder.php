<?php

use Illuminate\Database\Seeder;

class ProjectCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('project_categories')->insert(
            array(
                'category_name' => ' R&D outcomes, Final Year Projects (FYPs), Capstone Projects (Undergraduate / Postgraduate), Industrial Research Collaborations, Developmental types of work',
            )
        );
        DB::table('project_categories')->insert(
            array(
                'category_name' => ' Project outcomes of iSpark, Extra-Curriculum Projects, Non-Academic One-Off Projects',
            )
        );
        DB::table('project_categories')->insert(
            array(
                'category_name' => 'TAR UC Alumni / Public with commercializable project
                ',
            )
        );
    }
}
