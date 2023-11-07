<?php

use Illuminate\Database\Seeder;

class StudyPeriodChildrenTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $studyPeriodChildren =[
        	[
        		'study_period_id' 	=> 2,
            	'name'          	=>'First Semester',
                'status'        	=>'Active',
            ],
            [
        		'study_period_id' 	=> 2,
            	'name'          	=>'Second Semester',
                'status'        	=>'Active',
            ],
            [
        		'study_period_id' 	=> 3,
            	'name'          	=>'First Trimester',
                'status'        	=>'Active',
            ],
            [
        		'study_period_id' 	=> 3,
            	'name'          	=>'Second Trimester',
                'status'        	=>'Active',
            ],
        ];

        \App\Models\StudyPeriodChild::insert($studyPeriodChildren);
    }
}
