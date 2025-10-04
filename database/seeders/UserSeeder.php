<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin User',
                'email' => 'xyz@xyz.com',
                'password'=> bcrypt('test1234'),
                'role'=>'admin',
            ],
            [
                'name'=> 'Editor User',
                'email'=> 'what@what.com',
                'password'=> bcrypt('test1234'),
                'role'=>'editor',
            ],
            [
                'name'=> 'Regular User',
                'email'=> 'regular@regular.com',
                'password'=> bcrypt('test1234'),
                'role'=>'user',
            ],
            [
                'name'=> 'Reporter User',
                'email'=> 'reporter@reporter.com',
                'password'=> bcrypt('test1234'),
                'role'=>'reporter',
            ],
            [
                'name'=> 'Subscriber User',
                'email'=> 'sub@sub.com',
                'password'=> bcrypt('test1234'),
                'role'=> 'subscriber',
            ]
        ]);
    }
}
