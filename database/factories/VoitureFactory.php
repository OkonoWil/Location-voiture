<?php

namespace Database\Factories;

use App\Models\Voiture;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Voiture>
 */
class VoitureFactory extends Factory
{
    protected $model = Voiture::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'modele' => $this->fake->word,
            'immatriculation' => $this->fake->countryCode + $this->fake->unique()->randomNumber($nbDigits = 4) + $this->faker->randomLetter,
            'numeroSerie' => $this->fake->unique()->randomNumber($nbDigits = 10),
            'couleur' => $this->fake->couleur,
            'dateDeFabri' => $this->fake->date,
            'dateDeFabri' => $this->fake->random(2, 6),
            'tarifParJour' => $this->fake->randomElement([30000, 40000, 45000, 50000, 70000, 100000]),
            'marque_id' => $this->fake->random(1, 10),
        ];
    }
}
