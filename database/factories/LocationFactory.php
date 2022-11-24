<?php

namespace Database\Factories;

use App\Models\Location;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class LocationFactory extends Factory
{
    protected $model = Location::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'dateDebut' => $this->faker->dateTimeBetween('-400 week', 'now'),
            'dateFin' => $this->faker->dateTimeBetween('-200 week', 'now'),
            'montant' =>  $this->faker->randomElement([45000, 50000, 70000, 100000, 130000, 150000, 200000]),
            'caution' => $this->faker->randomElement([45000, 50000, 70000, 100000, 130000, 150000, 200000]),
            'client_id' => $this->faker->numberBetween(1, 400),
            'voiture_id' => $this->faker->numberBetween(1, 35),
            'user_id' => $this->faker->numberBetween(2, 20),
        ];
    }
}
