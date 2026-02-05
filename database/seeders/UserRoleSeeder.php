<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('user_role')->insert([
            ['id' => 1, 'name' => 'User', 'description' => 'General User'],
            ['id' => 2, 'name' => 'Admin', 'description' => 'Administrator'],
            ['id' => 3, 'name' => 'Senior Admin', 'description' => 'Senior Admin'],
        ]);
    }
}
