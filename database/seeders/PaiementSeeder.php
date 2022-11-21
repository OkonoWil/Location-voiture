<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaiementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('paiements')->insert([
            [
                'montant' => 150000,
                'datePaiement' => now(),
                'location_id' => 1,
                'user_id' => 5,
            ],
            [
                'montant' => 150000,
                'datePaiement' => now(),
                'location_id' => 2,
                'user_id' => 5,
            ],
            [
                'montant' => 150000,
                'datePaiement' => now(),
                'location_id' => 3,
                'user_id' => 3,
            ],
            [
                'montant' => 150000,
                'datePaiement' => now(),
                'location_id' => 4,
                'user_id' => 6,
            ],
            [
                'montant' => 150000,
                'datePaiement' => now(),
                'location_id' => 5,
                'user_id' => 2,
            ],
            [
                'montant' => 150000,
                'datePaiement' => now(),
                'location_id' => 6,
                'user_id' => 4,
            ],
            [
                'montant' => 150000,
                'datePaiement' => now(),
                'location_id' => 7,
                'user_id' => 3,
            ],
            [
                'montant' => 150000,
                'datePaiement' => now(),
                'location_id' => 8,
                'user_id' => 3,
            ],
            [
                'montant' => 150000,
                'datePaiement' => now(),
                'location_id' => 9,
                'user_id' => 3,
            ],
            [
                'montant' => 150000,
                'datePaiement' => now(),
                'location_id' => 10,
                'user_id' => 2,
            ],
        ]);
    }
}
