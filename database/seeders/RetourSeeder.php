<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RetourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('retours')->insert([
            [
                'dateRetour' => now(),
                'etat_id' => 1,
                'client_id' => 22,
                'user_id' => 5,
                'location_id' => 1,
            ],
            [
                'dateRetour' => now(),
                'etat_id' => 2,
                'location_id' => 2,
                'client_id' => 2,
                'user_id' => 5,
            ],
            [
                'dateRetour' => now(),
                'etat_id' => 2,
                'client_id' => 44,
                'location_id' => 3,
                'user_id' => 5,
            ],
            [
                'dateRetour' => now(),
                'etat_id' => 2,
                'client_id' => 5,
                'location_id' => 4,
                'user_id' => 5,
            ],
            [
                'dateRetour' => now(),
                'etat_id' => 2,
                'client_id' => 15,
                'location_id' => 5,
                'user_id' => 5,
            ],
            [
                'dateRetour' => now(),
                'etat_id' => 1,
                'client_id' => 23,
                'location_id' => 6,
                'user_id' => 5,
            ],
            [
                'dateRetour' => now(),
                'etat_id' => 1,
                'client_id' => 25,
                'location_id' => 7,
                'user_id' => 5,
            ],
            [
                'dateRetour' => now(),
                'etat_id' => 1,
                'client_id' => 20,
                'location_id' => 8,
                'user_id' => 5,
            ],
            [
                'dateRetour' => now(),
                'etat_id' => 3,
                'client_id' => 67,
                'location_id' => 9,
                'user_id' => 5,
            ],
            [
                'dateRetour' => now(),
                'etat_id' => 1,
                'client_id' => 31,
                'location_id' => 10,
                'user_id' => 5,
            ],
        ]);
    }
}
