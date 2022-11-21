<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('locations')->insert([
            [
                'dateDebut' => '2022-11-20',
                'dateFin' => '2022-11-21',
                'montant' => 100000,
                'caution' => 50000,
                'client_id' => 22,
                'voiture_id' => 1,
                'user_id' => 3,
            ],
            [
                'dateDebut' => '2022-11-20',
                'dateFin' => '2022-11-21',
                'montant' => 100000,
                'caution' => 50000,
                'client_id' => 32,
                'voiture_id' => 1,
                'user_id' => 3,
            ],
            [
                'dateDebut' => '2022-11-20',
                'dateFin' => '2022-11-21',
                'montant' => 100000,
                'caution' => 50000,
                'client_id' => 44,
                'voiture_id' => 10,
                'user_id' => 3,
            ],
            [
                'dateDebut' => '2022-11-20',
                'dateFin' => '2022-11-21',
                'montant' => 100000,
                'caution' => 50000,
                'client_id' => 5,
                'voiture_id' => 10,
                'user_id' => 3,
            ],
            [
                'dateDebut' => '2022-11-20',
                'dateFin' => '2022-11-21',
                'montant' => 100000,
                'caution' => 50000,
                'client_id' => 15,
                'voiture_id' => 3,
                'user_id' => 3,
            ],
            [
                'dateDebut' => '2022-11-20',
                'dateFin' => '2022-11-21',
                'montant' => 100000,
                'caution' => 50000,
                'client_id' => 23,
                'voiture_id' => 20,
                'user_id' => 3,
            ],
            [
                'dateDebut' => '2022-11-20',
                'dateFin' => '2022-11-21',
                'montant' => 100000,
                'caution' => 50000,
                'client_id' => 25,
                'voiture_id' => 7,
                'user_id' => 3,
            ],
            [
                'dateDebut' => '2022-11-20',
                'dateFin' => '2022-11-21',
                'montant' => 100000,
                'caution' => 50000,
                'client_id' => 20,
                'voiture_id' => 6,
                'user_id' => 3,
            ],
            [
                'dateDebut' => '2022-11-20',
                'dateFin' => '2022-11-21',
                'montant' => 100000,
                'caution' => 50000,
                'client_id' => 67,
                'voiture_id' => 19,
                'user_id' => 3,
            ],
            [
                'dateDebut' => '2022-11-20',
                'dateFin' => '2022-11-21',
                'montant' => 100000,
                'caution' => 50000,
                'client_id' => 31,
                'voiture_id' => 30,
                'user_id' => 3,
            ],
        ]);
    }
}
