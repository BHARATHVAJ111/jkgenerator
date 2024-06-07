<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use Carbon\Carbon;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Seed roles with values starting from 0
        $roles = [
            ['type' => 'admin', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['type' => 'store', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['type' => 'sales', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['type' => 'service', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            // Add more roles as needed
        ];

        // Insert the data into the roles table
        Role::insert($roles);
    }
}
