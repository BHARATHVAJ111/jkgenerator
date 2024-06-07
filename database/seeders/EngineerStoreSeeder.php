<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EngineerStoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Define the data to be inserted
         $data = [
            [
                'name' => 'engineer1',
                'email' => 'john@example.com',
                'password' => bcrypt('password123'), // You can use bcrypt() to hash passwords
                'phone' => '1234567890',
                'engineer_id'=>'1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'engineer2',
                'email' => 'jane@example.com',
                'password' => bcrypt('password123'),
                'phone' => '0987654321',
                'engineer_id'=>'2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'engineer3',
                'email' => 'johndoe@example.com',
                'password' => bcrypt('password123'), // You can use bcrypt() to hash passwords
                'phone' => '1234567890',
                'engineer_id'=>'3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
           
            // Add more data as needed
        ];

        // Insert the data into the engineer_stores table
        DB::table('engineer_stores')->insert($data);
    }
}
