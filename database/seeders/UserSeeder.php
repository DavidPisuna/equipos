<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
{
    
    DB::table('users')->insert([
        [
            'name' => 'Admin User',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'role' => 'admin',
            'status' => 'active',
            'password' => bcrypt('123456'),
        ],
        [
            'name' => 'Vendor User',
            'username' => 'vendor',
            'email' => 'vendor@gmail.com',
            'role' => 'vendor',
            'status' => 'active',
            'password' => bcrypt('123456'),
        ],
        [
            'name' => 'User',
            'username' => 'user',
            'email' => 'user@gmail.com',
            'role' => 'user',
            'status' => 'active',
            'password' => bcrypt('123456'),
        ]
    ]);
}

}
