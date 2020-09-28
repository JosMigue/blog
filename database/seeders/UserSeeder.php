<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->insert([
            'name'=>'Francisco Vázquez Delgado',
            'email'=> 'blog@blog.com.mx',
            'email_verified_at'=>'2020-09-28 12:00:00',
            'password'=>'$2y$10$H8pgJ7HTjCLfv.68zRNpbeqLCUpDLUylfX0.zp01WwRGsxm/VDMSW',
            'remember_token' => null,
            'created_at'=>'2020-09-28 12:00:00',
            'updated_at'=>'2020-09-28 12:00:00'
        ]);

        \DB::table('users')->insert([
            'name'=>'José Miguel Galván Pérez',
            'email'=> 'blog2@blog.com.mx',
            'email_verified_at'=>'2020-09-28 12:00:00',
            'password'=>'$2y$10$H8pgJ7HTjCLfv.68zRNpbeqLCUpDLUylfX0.zp01WwRGsxm/VDMSW',
            'remember_token' => null,
            'created_at'=>'2020-09-28 12:00:00',
            'updated_at'=>'2020-09-28 12:00:00'
        ]);
    }
}
