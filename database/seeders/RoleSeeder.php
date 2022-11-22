<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
                'nomrole' => 'manager',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nomrole' => 'employe',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nomrole' => 'technicien',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
