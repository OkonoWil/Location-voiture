<?php

namespace Database\Factories;

use App\Models\Paiement;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Paiement>
 */
class PaiementFactory extends Factory
{
    protected $model = Paiement::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'montant' =>  $this->faker->randomElement([45000, 50000, 70000, 100000, 130000, 150000, 200000]),
            'datePaiement' => $this->faker->dateTimeBetween('-400 week', 'now'),
            'location_id' => $this->faker->unique->numberBetween(11, 510),
            'user_id' => $this->faker->numberBetween(2, 20),
        ];
    }
}
