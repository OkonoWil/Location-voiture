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
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nomMarque' => 'Audi',
                'paysMarque' => 'Allemagne',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nomMarque' => 'Jeep',
                'paysMarque' => 'Eats-Unis',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nomMarque' => 'Lotus',
                'paysMarque' => 'Rayaule-Uni',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nomMarque' => 'Opel',
                'paysMarque' => 'Allemagne',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nomMarque' => 'Suzuki',
                'paysMarque' => 'Japan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nomMarque' => 'Toyota',
                'paysMarque' => 'Japan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nomMarque' => 'Renault',
                'paysMarque' => 'France',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nomMarque' => 'Nissan',
                'paysMarque' => 'Japon',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nomMarque' => 'Mercedes-Benz',
                'paysMarque' => 'Allemagne',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
