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
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'montant' => 150000,
                'datePaiement' => now(),
                'location_id' => 2,
                'user_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'montant' => 150000,
                'datePaiement' => now(),
                'location_id' => 3,
                'user_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'montant' => 150000,
                'datePaiement' => now(),
                'location_id' => 4,
                'user_id' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'montant' => 150000,
                'datePaiement' => now(),
                'location_id' => 5,
                'user_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'montant' => 150000,
                'datePaiement' => now(),
                'location_id' => 6,
                'user_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'montant' => 150000,
                'datePaiement' => now(),
                'location_id' => 7,
                'user_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'montant' => 150000,
                'datePaiement' => now(),
                'location_id' => 8,
                'user_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'montant' => 150000,
                'datePaiement' => now(),
                'location_id' => 9,
                'user_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'montant' => 150000,
                'datePaiement' => now(),
                'location_id' => 10,
                'user_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
