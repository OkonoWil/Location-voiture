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
            'modele' => $this->faker->word,
            'immatriculation' => $this->faker->unique()->regexify('LT[0-9]{4}[A-Z]{2}'),
            'numeroSerie' => $this->faker->unique()->randomNumber($nbDigits = 7),
            'couleur' => $this->faker->safeColorName,
            "photo" => $this->faker->regexify('voitures/v000[1-9][.]jpg'),
            'dateDeFabri' => $this->faker->dateTimeBetween('-1000 week', '-600 week'),
            'nombrePlace' => $this->faker->randomElement($array = [2, 3, 4, 5, 6,]),
            'tarifParJour' => $this->faker->randomElement([30000, 40000, 45000, 50000, 70000, 100000]),
            'marque_id' => $this->faker->randomElement($array = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10]),
        ];
    }
}
