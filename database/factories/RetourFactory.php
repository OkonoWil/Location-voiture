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
            'location_id' => $this->faker->numberBetween(11, 510),
            'dateRetour' => $this->faker->date,
            'client_id' => $this->faker->numberBetween(1, 300),
            'user_id' => $this->faker->numberBetween(2, 20),
            'etat_id' => $this->faker->numberBetween(1, 4),
        ];
    }
}
