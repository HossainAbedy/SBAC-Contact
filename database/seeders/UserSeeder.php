<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'ABEDY',
            'email' => 'hossain.abedy@sbacbank.com',
            'role' => 'admin',
            'empid' => '1378',
            'branch_code' => '0001',
            'img' => 'images/abedy.png',
            'password' => Hash::make('password'),
        ]);
    }
}
