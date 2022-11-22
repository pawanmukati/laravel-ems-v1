<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $users = [
            [
               'name'=>'Admin User',
               'email'=>'admin@tutsmake.com',
               'type'=>1,
               'address'=>'indore',
               'birthday'=>Carbon::parse('2000-01-01'),
               'dob'=>Carbon::parse('2000-01-01'),
               'basic_salary'=>'52000',
               'image'=>'',
               'password'=> bcrypt('123456'),
            ],
            [
               'name'=>'Manager User',
               'email'=>'manager@tutsmake.com',
               'type'=> 2,
               'address'=>'indore',
               'birthday'=>Carbon::parse('2000-01-01'),
               'dob'=>Carbon::parse('2000-01-01'),
               'basic_salary'=>'35000',
               'image'=>'',
               'password'=> bcrypt('123456'),
            ],
            [
               'name'=>'User',
               'email'=>'user@tutsmake.com',
               'type'=>0,
               'address'=>'indore',
               'birthday'=>Carbon::parse('2000-01-01'),
               'dob'=>Carbon::parse('2000-01-01'),
               'basic_salary'=>'25000',
               'image'=>'',
               'password'=> bcrypt('123456'),
            ],
        ];

        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}
