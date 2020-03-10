<?php

use Illuminate\Database\Seeder;

class CenterFacultiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('center_faculties')->insert([
            [
                'name' => 'Bursary',
                'code' => 'bur',
            ],
            [
                'name' => 'Center of Business Inubation Center and Entreprnuerial Ventures',
                'code' => 'cbiev',
            ],
            [
                'name' => 'Center of Continuing and Profesisonal Education',
                'code' => 'cpe',
            ],
            [
                'name' => 'Center of Postgraduete Studies and Research',
                'code' => 'cpsr',
            ],
            [
                'name' => 'Center of Pre-University Studies',
                'code' => 'cpus',
            ],    
            [
                'name' => 'Communication and Information Technology Center',
                'code' => 'cit',
            ],    
            [
                'name' => 'Department of Admission and Credit Evaluation',
                'code' => 'dace',
            ],    
            [
                'name' => 'Department of Alumni Relation',
                'code' => 'dar',
            ],
            [
                'name' => 'Department of Corperate Communication and Marketing',
                'code' => 'ccm',
            ],    
            [
                'name' => 'Department of Estate and Maintenance',
                'code' => 'dem',
            ],    
            [
                'name' => 'Department of Examinations and Credit Accumulation',
                'code' => 'deca',
            ],    
            [
                'name' => 'Department of Human Resource',
                'code' => 'dhr',
            ],    
            [
                'name' => 'Department of International Student Office',
                'code' => 'diso',
            ],    
            [
                'name' => 'Department of Quality Assurance',
                'code' => 'dqa',
            ],    
            [
                'name' => 'Department of Security',
                'code' => 'dos',
            ],    
            [
                'name' => 'Departmet of Student Affair',
                'code' => 'dsa',
            ],    
            [
                'name' => 'Faculty of Accountancy, Finance and Business',
                'code' => 'fafb',
            ],
            [
                'name' => 'Faculty of Applied Science',
                'code' => 'foas',
            ],
            [
                'name' => 'Faculty of Build Enviroment',
                'code' => 'fobe',
            ],
            [
                'name' => 'Faculty of Communication and Creative Industry',
                'code' => 'fcci',
            ],
            [
                'name' => 'Faculty of Computing and Information Technology',
                'code' => 'focs',
            ],
            [
                'name' => 'Faculty of Engineering and Technology',
                'code' => 'foet',
            ],
            [
                'name' => 'Faculty of Social Science and Humanities',
                'code' => 'fssh',
            ],
            [
                'name' => 'Library',
                'code' => 'lib',
            ],    
            [
                'name' => 'Office of the Chairman',
                'code' => 'co',
            ],
            [
                'name' => 'Office of the President',
                'code' => 'opres',
            ],
            [
                'name' => 'Registry',
                'code' => 'oreg',
            ],
            
        ]);
    }
}
