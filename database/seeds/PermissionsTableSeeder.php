<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions =[
        	[
            	'module_id'     =>1,
            	'name'          =>'View Module',
                'slug'         	=>'view-module',
            ],
            [
            	'module_id'     =>1,
            	'name'          =>'Create Module',
                'slug'         	=>'create-module',
            ],
            [
            	'module_id'     =>1,
            	'name'          =>'Edit Module',
                'slug'         	=>'edit-module',
            ],
            [
            	'module_id'     =>1,
            	'name'          =>'Delete Module',
                'slug'         	=>'delete-module',
            ],
            [
            	'module_id'     =>2,
            	'name'          =>'View Permission',
                'slug'         	=>'view-permission',
            ],
            [
            	'module_id'     =>2,
            	'name'          =>'Create permission',
                'slug'         	=>'create-permission',
            ],
            [
            	'module_id'     =>2,
            	'name'          =>'Edit Permission',
                'slug'         	=>'edit-permission',
            ],
            [
            	'module_id'     =>2,
            	'name'          =>'Delete Permission',
                'slug'         	=>'delete-permission',
            ],

            [
            	'module_id'     =>3,
            	'name'          =>'View Role',
                'slug'         	=>'view-role',
            ],
            [
            	'module_id'     =>3,
            	'name'          =>'Create Role',
                'slug'         	=>'create-role',
            ],
            [
            	'module_id'     =>3,
            	'name'          =>'Edit Role',
                'slug'         	=>'edit-role',
            ],
            [
            	'module_id'     =>3,
            	'name'          =>'Delete Role',
                'slug'         	=>'delete-role',
            ],
            [
            	'module_id'     =>4,
            	'name'          =>'View Admin User',
                'slug'         	=>'view-admin-user',
            ],
            [
            	'module_id'     =>4,
            	'name'          =>'Create Admin User',
                'slug'         	=>'create-admin-user',
            ],
            [
            	'module_id'     =>4,
            	'name'          =>'Edit Admin User',
                'slug'         	=>'edit-admin-user',
            ],
            [
            	'module_id'     =>4,
            	'name'          =>'Delete Admin User',
                'slug'         	=>'delete-admin-user',
            ],

             [
            	'module_id'     =>5,
            	'name'          =>'View Front User',
                'slug'         	=>'view-front-user',
            ],
            [
            	'module_id'     =>5,
            	'name'          =>'Create Front User',
                'slug'         	=>'create-front-user',
            ],
            [
            	'module_id'     =>5,
            	'name'          =>'Edit Front User',
                'slug'         	=>'edit-front-user',
            ],
            [
            	'module_id'     =>5,
            	'name'          =>'Delete Front User',
                'slug'         	=>'delete-front-user',
            ],
   
    		[
            	'module_id'     =>6,
            	'name'          =>'View Study Period',
                'slug'         	=>'view-study-period',
            ],
            [
            	'module_id'     =>6,
            	'name'          =>'Create Study Period',
                'slug'         	=>'create-study-period',
            ],
            [
            	'module_id'     =>6,
            	'name'          =>'Edit Study Period',
                'slug'         	=>'edit-study-period',
            ],
            [
            	'module_id'     =>6,
            	'name'          =>'Delete Study Period',
                'slug'         	=>'delete-study-period',
            ],

            [
            	'module_id'     =>7,
            	'name'          =>'View Program',
                'slug'         	=>'view-program',
            ],
            [
            	'module_id'     =>7,
            	'name'          =>'Create Program',
                'slug'         	=>'create-program',
            ],
            [
            	'module_id'     =>7,
            	'name'          =>'Edit Program',
                'slug'         	=>'edit-program',
            ],
            [
            	'module_id'     =>7,
            	'name'          =>'Delete Program',
                'slug'         	=>'delete-program',
            ],

            [
            	'module_id'     =>8,
            	'name'          =>'View Class',
                'slug'         	=>'view-grade',
            ],
            [
            	'module_id'     =>8,
            	'name'          =>'Create Class',
                'slug'         	=>'create-grade',
            ],
            [
            	'module_id'     =>8,
            	'name'          =>'Edit Class',
                'slug'         	=>'edit-grade',
            ],
            [
            	'module_id'     =>8,
            	'name'          =>'Delete Class',
                'slug'         	=>'delete-grade',
            ],
            [
            	'module_id'     =>9,
            	'name'          =>'View Subject',
                'slug'         	=>'view-subject',
            ],
            [
            	'module_id'     =>9,
            	'name'          =>'Create Subject',
                'slug'         	=>'create-subject',
            ],
            [
            	'module_id'     =>9,
            	'name'          =>'Edit Subject',
                'slug'         	=>'edit-subject',
            ],
            [
            	'module_id'     =>9,
            	'name'          =>'Delete Subject',
                'slug'         	=>'delete-subject',
            ],
       		[
            	'module_id'     =>10,
            	'name'          =>'View Unit',
                'slug'         	=>'view-unit',
            ],
            [
            	'module_id'     =>10,
            	'name'          =>'Create Unit',
                'slug'         	=>'create-unit',
            ],
            [
            	'module_id'     =>10,
            	'name'          =>'Edit Unit',
                'slug'         	=>'edit-unit',
            ],
            [
            	'module_id'     =>10,
            	'name'          =>'Delete Unit',
                'slug'         	=>'delete-unit',
            ],

            [
            	'module_id'     =>11,
            	'name'          =>'View Lesson',
                'slug'         	=>'view-lesson',
            ],
            [
            	'module_id'     =>11,
            	'name'          =>'Create Lesson',
                'slug'         	=>'create-lesson',
            ],
            [
            	'module_id'     =>11,
            	'name'          =>'Edit Lesson',
                'slug'         	=>'edit-lesson',
            ],
            [
            	'module_id'     =>11,
            	'name'          =>'Delete Lesson',
                'slug'         	=>'delete-lesson',
            ],
            [
            	'module_id'     =>12,
            	'name'          =>'View Note',
                'slug'         	=>'view-note',
            ],
            [
            	'module_id'     =>12,
            	'name'          =>'Create Note',
                'slug'         	=>'create-note',
            ],
            [
            	'module_id'     =>12,
            	'name'          =>'Edit Note',
                'slug'         	=>'edit-note',
            ],
            [
            	'module_id'     =>12,
            	'name'          =>'Delete Note',
                'slug'         	=>'delete-note',
            ],
            [
                'module_id'     =>13,
                'name'          =>'View Note Video',
                'slug'          =>'view-note-video',
            ],
            [
                'module_id'     =>13,
                'name'          =>'Create Note Video',
                'slug'          =>'create-note-video',
            ],
            [
                'module_id'     =>13,
                'name'          =>'Edit Note Video',
                'slug'          =>'edit-note-video',
            ],
            [
                'module_id'     =>13,
                'name'          =>'Delete Note Video',
                'slug'          =>'delete-note-video',
            ],

            [
                'module_id'     =>14,
                'name'          =>'View Note Subjective Question',
                'slug'          =>'view-note-subjective-question',
            ],
            [
                'module_id'     =>14,
                'name'          =>'Create Note Subjective Question',
                'slug'          =>'create-note-subjective-question',
            ],
            [
                'module_id'     =>14,
                'name'          =>'Edit Note Subjective Question',
                'slug'          =>'edit-note-subjective-question',
            ],
            [
                'module_id'     =>14,
                'name'          =>'Delete Note Subjective Question',
                'slug'          =>'delete-note-subjective-question',
            ],
             [
                'module_id'     =>15,
                'name'          =>'View Note Objective Question',
                'slug'          =>'view-note-objective-question',
            ],
            [
                'module_id'     =>15,
                'name'          =>'Create Note Objective Question',
                'slug'          =>'create-note-objective-question',
            ],
            [
                'module_id'     =>15,
                'name'          =>'Edit Note Objective Question',
                'slug'          =>'edit-note-objective-question',
            ],
            [
                'module_id'     =>15,
                'name'          =>'Delete Note Objective Question',
                'slug'          =>'delete-note-objective-question',
            ],
            [
                'module_id'     =>16,
                'name'          =>'View Note Comment',
                'slug'          =>'view-note-comment',
            ],
            [
                'module_id'     =>16,
                'name'          =>'Create Note Comment',
                'slug'          =>'create-note-comment',
            ],
            [
                'module_id'     =>16,
                'name'          =>'Edit Note Comment',
                'slug'          =>'edit-note-comment',
            ],
            [
                'module_id'     =>16,
                'name'          =>'Delete Note Comment',
                'slug'          =>'delete-note-comment',
            ],
            [
                'module_id'     =>17,
                'name'          =>'View Note Comment Reply',
                'slug'          =>'view-note-comment-reply',
            ],
            [
                'module_id'     =>17,
                'name'          =>'Create Note Comment Reply',
                'slug'          =>'create-note-comment-reply',
            ],
            [
                'module_id'     =>17,
                'name'          =>'Edit Note Comment Reply',
                'slug'          =>'edit-note-comment-reply',
            ],
            [
                'module_id'     =>17,
                'name'          =>'Delete Note Comment Reply',
                'slug'          =>'delete-note-comment-reply',
            ],
            [
                'module_id'     =>18,
                'name'          =>'View Glossary',
                'slug'          =>'view-glossary',
            ],
            [
                'module_id'     =>18,
                'name'          =>'Create Glossary',
                'slug'          =>'create-glossary',
            ],
            [
                'module_id'     =>18,
                'name'          =>'Edit Glossary',
                'slug'          =>'edit-glossary',
            ],
            [
                'module_id'     =>18,
                'name'          =>'Delete Glossary',
                'slug'          =>'delete-glossary',
            ],
            [
                'module_id'     =>19,
                'name'          =>'View Bug',
                'slug'          =>'view-bug',
            ],
            [
                'module_id'     =>19,
                'name'          =>'Create Bug',
                'slug'          =>'create-bug',
            ],
            [
                'module_id'     =>19,
                'name'          =>'Edit Bug',
                'slug'          =>'edit-bug',
            ],
            [
                'module_id'     =>19,
                'name'          =>'Delete Bug',
                'slug'          =>'delete-bug',
            ],

        ];

        \App\Models\Permission::insert($permissions);
    }
}
