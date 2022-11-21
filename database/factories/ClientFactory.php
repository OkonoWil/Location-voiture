<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    protected $model = Client::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "name" => $this->faker->name,
            "lastName" => $this->faker->lastName,
            "dateDeNaissance" => $this->faker->date,
            "lieuDeNaissance" => $this->faker->country,
            "nationalite" => $this->faker->country,
            "ville" => $this->faker->randomElement($array = array('Douala', 'Yaoundé', 'Dschang')),
            "pays" => 'Cameroun',
            "Adresse" => $this->faker->address,
            "sexe" => $this->faker->randomElement($array = array('Homme', 'Femme')),
            "email" => $this->faker->unique()->email,
            "phone1" => $this->faker->unique()->e164PhoneNumber,
            "phone2" => $this->faker->e164PhoneNumber,
            "user_id" => $this->random(2, 7),
            "photo" => $this->faker->imageUrl,
            "pieceIdentite" => $this->faker->randomElement($array = array('CNI', 'Passport')),
            "numeroPieceIdentite" => $this->faker->unique()->randomNumber($nbDigits = 9),
        ];
    }
}
