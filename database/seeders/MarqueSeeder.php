<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MarqueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("marques")->insert([
            [
                'nomMarque' => 'BMW',
                'paysMarque' => 'Allemagne',
            ],
            [
                'nomMarque' => 'Audi',
                'paysMarque' => 'Allemagne',
            ],
            [
                'nomMarque' => 'Jeep',
                'paysMarque' => 'Eats-Unis',
            ],
            [
                'nomMarque' => 'Lotus',
                'paysMarque' => 'Rayaule-Uni',
            ],
            [
                'nomMarque' => 'Opel',
                'paysMarque' => 'Allemagne',
            ],
            [
                'nomMarque' => 'Suzuki',
                'paysMarque' => 'Japan',
            ],
            [
                'nomMarque' => 'Toyota',
                'paysMarque' => 'Japan',
            ],
            [
                'nomMarque' => 'Renault',
                'paysMarque' => 'France',
            ],
            [
                'nomMarque' => 'Nissan',
                'paysMarque' => 'Japon',
            ],
            [
                'nomMarque' => 'Mercedes-Benz',
                'paysMarque' => 'Allemagne',
            ],
        ]);
    }
}
