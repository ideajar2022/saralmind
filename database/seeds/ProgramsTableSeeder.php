<?php

use Illuminate\Database\Seeder;

class ProgramsTableSeeder extends Seeder
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
            	'name'          =>'High School',
            	'slug'          =>'high-school',
                'status'        =>'APPROVED',
                'created_by'	=>1,
            ],
            [
            	'name'          =>'Middle School',
            	'slug'          =>'middle-school',
                'status'        =>'APPROVED',
                'created_by'	=>1,
            ],
   			[
            	'name'          =>'HSEB',
            	'slug'          =>'hseb',
                'status'        =>'APPROVED',
                'created_by'	=>1,
            ],
        ];

        \App\Models\Program::insert($studyPeriods);
    }
}
