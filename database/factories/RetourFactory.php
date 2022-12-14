<?php

namespace Database\Factories;

use App\Models\Retour;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class RetourFactory extends Factory
{
    protected $model = Retour::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'location_id' => $this->faker->numberBetween(11, 1010),
            'dateRetour' => $this->faker->dateTimeBetween('-200 week', 'now'),
            'client_id' => $this->faker->numberBetween(1, 400),
            'user_id' => $this->faker->numberBetween(2, 20),
            'etat_id' => $this->faker->numberBetween(1, 4),
        ];
    }
}
