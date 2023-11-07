<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles =[
        	[
            	'name'          =>'Administrator',
                'slug'         	=>'administrator',
            ],
            
            [
            	'name'          =>'Data Entry',
                'slug'         	=>'data-entry',
            ],

        ];

        \App\Models\Role::insert($roles);
    }
}
