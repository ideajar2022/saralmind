<?php

use Illuminate\Database\Seeder;

class ModulesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $modules =[
        	[
            	'name'          =>'Module Management',
                'slug'         	=>'module-management',
            ],
            
            [
            	'name'          =>'Permission Management',
                'slug'         	=>'permission-management',
            ],

            [
            	'name'          =>'Role Management',
                'slug'         	=>'role-management',
            ],
    
            [
            	'name'          =>'Admin User Management',
                'slug'         	=>'admin-user-management',
            ],

            [
            	'name'          =>'Front User Management',
                'slug'         	=>'front-user-management',
            ],
            
            [
            	'name'          =>'Study Period Management',
                'slug'         	=>'study-period-management',
            ],

            [
            	'name'          =>'Program Management',
                'slug'         	=>'program-management',
            ],

            [
            	'name'          =>'Class Management',
                'slug'         	=>'class-management',
            ],

            [
            	'name'          =>'Subject Management',
                'slug'         	=>'subject-management',
            ],

            [
            	'name'          =>'Unit Management',
                'slug'         	=>'unit-management',
            ],

            [
            	'name'          =>'Lesson Management',
                'slug'         	=>'lesson-management',
            ],

            [
            	'name'          =>'Note Management',
                'slug'         	=>'note-management',
            ],
            [
                'name'          =>'Video Management',
                'slug'          =>'video-management',
            ],
            [
                'name'          =>'Subjective Question Answer Management',
                'slug'          =>'subjective-question-answer-management',
            ],
            [
                'name'          =>'MCQ Management',
                'slug'          =>'mcq-management',
            ],
            [
                'name'          =>'Comment Management',
                'slug'          =>'comment-management',
            ],
            [
                'name'          =>'Reply Management',
                'slug'          =>'reply-management',
            ],
            [
                'name'          =>'Glossaries Management',
                'slug'          =>'glossaries-management',
            ],
            [
                'name'          =>'Bugs Management',
                'slug'          =>'bugs-management',
            ],


        ];

        \App\Models\Module::insert($modules);
    }
}
