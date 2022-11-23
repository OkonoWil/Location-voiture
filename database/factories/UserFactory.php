<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    protected $model = User::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "name" => $this->faker->name,
            'username' => fake()->unique()->name(),
            "lastName" => $this->faker->lastName,
            "sexe" => $this->faker->randomElement($array = array('Homme', 'Femme')),
            'email' => fake()->unique()->safeEmail(),
            'sexe' => $this->faker->randomElement($array = array('Homme', 'Femme')),
            "salaire" => $this->faker->randomElement($array = array(150000, 130000, 120000, 100000)),
            "phone1" => $this->faker->unique()->regexify('[6][256789][0-9]{7}'),
            "phone2" => $this->faker->regexify('[6][256789][0-9]{7}'),
            "photo" => $this->faker->imageUrl,
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            "role_id" => $this->faker->randomElement($array = [2, 3]),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
