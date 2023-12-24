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
            [
                'branch' => 'Katakhali Branch',
                'branch_code' => '0007',
                'department' => 'Head of Branch',
                'name' => 'Mr. Md. Shahidur Rahman',
                'empid' => '334',
                'designation' => 'VP',
                'mobile_number' => '01787693616',
                'telephone_number' => '+8804-66356117',
                'email' => 'rahman.shahidur@sbacbank.com',
            ],
            // Add more contact data arrays as needed
            [
                'branch' => 'Katakhali Branch',
                'branch_code' => '0007',
                'department' => 'Operation Manager',
                'name' => 'Mr. Md. Mahbub Hossain',
                'empid' => '650',
                'designation' => 'EO',
                'mobile_number' => '01707070441,01911091441',
                'telephone_number' => '+8804-66356117',
                'email' => 'mahbub.hossain@sbacbank.com',
            ],
            // Add more contact data arrays as needed
            [
                'branch' => 'Katakhali Branch',
                'branch_code' => '0007',
                'department' => 'Foreign Trade In-charge',
                'name' => 'Mrs. Sayma Sultana',
                'empid' => '288',
                'designation' => 'FEO',
                'mobile_number' => '01759759764',
                'telephone_number' => '+8804-66356117',
                'email' => 'sayma.sultana@sbacbank.com',
            ],
            // Add more contact data arrays as needed
            [
                'branch' => 'Katakhali Branch',
                'branch_code' => '0007',
                'department' => 'Credit In-Charge',
                'name' => 'Mr. Md. Mostafizur Rahman',
                'empid' => '633',
                'designation' => 'FEO',
                'mobile_number' => '01714502878',
                'telephone_number' => '+8804-66356117',
                'email' => 'rahman.mostafizur@sbacbank.com',
            ],
            // Add more contact data arrays as needed
            [
                'branch' => 'Katakhali Branch',
                'branch_code' => '0007',
                'department' => 'GB',
                'name' => 'Ms.Habiba Kumkum',
                'empid' => '980',
                'designation' => 'AO',
                'mobile_number' => '001765666322',
                'telephone_number' => '+8804-66356117',
                'email' => 'Kumkum@sbacbank.com',
            ],
            // Add more contact data arrays as needed
            [
                'branch' => 'Katakhali Branch',
                'branch_code' => '0007',
                'department' => 'GB',
                'name' => 'Tarin Hossain',
                'empid' => '1019',
                'designation' => 'AO',
                'mobile_number' => '01906318010',
                'telephone_number' => '+8804-66356117',
                'email' => 'tarin.hossain@sbacbank.com',
            ],
        ];

        // Insert multiple rows into the contacts table
        DB::table('contacts')->insert($contacts);
    }
}
