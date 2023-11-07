<?php

use Illuminate\Database\Seeder;

class StudyPeriodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $studyPeriods =[
        	[
            	'name'          =>'Yearly',
                'status'        =>'Active',
            ],
            [
            	'name'          =>'Semester',
                'status'        =>'Active',
            ],
   			[
            	'name'          =>'Trimester',
                'status'        =>'Active',
            ],
        ];

        \App\Models\StudyPeriod::insert($studyPeriods);
    }
}
