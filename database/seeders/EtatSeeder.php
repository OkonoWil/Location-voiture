<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EtatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("etats")->insert([
            [
                'nomEtat' => 'Bon',
                'montantDegat' => 0,
            ],
            [
                'nomEtat' => 'Mauvais',
                'montantDegat' => 0.35,
            ],
            [
                'nomEtat' => 'Très mauvais',
                'montantDegat' => 0.8,
            ],
            [
                'nomEtat' => 'Voiture détruit',
                'montantDegat' => 1,
            ],
        ]);
    }
}
