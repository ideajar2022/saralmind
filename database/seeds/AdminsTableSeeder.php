<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admins =
            array(
                'name'          =>'Kendra Mukhia',
                'email'         =>'info@saralmind.com',
                'password'      =>Hash::make('somestring'),
                'is_superadmin' =>1,
                'phone_no'      =>'9803479257',
                'status'        =>'Active'
            );
        \App\Models\Admin::insert($admins);
    }
}
