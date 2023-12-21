<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $contacts = [
            [
                'branch' => 'Head Office',
                'branch_code' => '0001',
                'department' => 'MD & CEO',
                'name' => 'Mr. Habibur Rahman',
                'empid' => '0001',
                'designation' => 'MD',
                'mobile_number' => '01714177755',
                'telephone_number' => '02-41052804 (D), 02-41052811-14, Ext-203',
                'email' => 'habib@sbacbank.com',
            ],
            // Add more contact data arrays as needed
            [
                'branch' => 'Head Office',
                'branch_code' => '0001',
                'department' => 'MD & CEO',
                'name' => 'Mr. Md. Nurul Azim',
                'empid' => '217',
                'designation' => 'DMD',
                'mobile_number' => '01787693769',
                'telephone_number' => '02-41052805 (D), 02-41052811-14, Ext-280',
                'email' => 'nurul.azim@sbacbank.com',
            ],
            // Add more contact data arrays as needed
            [
                'branch' => 'Head Office',
                'branch_code' => '0001',
                'department' => 'MD & CEO',
                'name' => 'Mr. Md. Altaf Hossain Bhuyan',
                'empid' => '338',
                'designation' => 'DMD',
                'mobile_number' => '01787693727',
                'telephone_number' => '02-47118618-20, Ext-540',
                'email' => 'altaf@sbacbank.com',
            ],
            // Add more contact data arrays as needed
            [
                'branch' => 'Head Office',
                'branch_code' => '0001',
                'department' => 'MD & CEO',
                'name' => 'Mr. AKM Rashedul Hoque Chowdhury',
                'empid' => '1169',
                'designation' => 'DMD',
                'mobile_number' => '01787693980',
                'telephone_number' => '02-47118618-20, Ext-503',
                'email' => 'rashedul@sbacbank.com',
            ],
            // Add more contact data arrays as needed
            [
                'branch' => 'Head Office',
                'branch_code' => '0001',
                'department' => 'MD & CEO',
                'name' => 'Mr. Md. Abdul Matin	',
                'empid' => '1316',
                'designation' => 'DMD',
                'mobile_number' => '01711313566',
                'telephone_number' => '02-41052806 (D), 02-41052811-14, Ext-250',
                'email' => 'abdul.matin@sbacbank.com',
            ],
            // Add more contact data arrays as needed
        ];

        // Insert multiple rows into the contacts table
        DB::table('contacts')->insert($contacts);
    }
}
