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
            "dateDeNaissance" => $this->faker->dateTimeBetween('-2500 week', '-1250 week'),
            "lieuDeNaissance" => $this->faker->country,
            "sexe" => $this->faker->randomElement($array = array('Homme', 'Femme')),
            "nationalite" => $this->faker->country,
            "ville" => $this->faker->randomElement($array = array('Douala', 'Yaoundé', 'Dschang')),
            "pays" => 'Cameroun',
            "Adresse" => $this->faker->address,
            "pieceIdentite" => $this->faker->randomElement($array = array('CNI', 'Passport')),
            "email" => $this->faker->unique()->email,
            "phone1" => $this->faker->unique()->regexify('[6][256789][0-9]{7}'),
            "phone2" => $this->faker->regexify('[6][256789][0-9]{7}'),
            "photo" => $this->faker->regexify('profils/pp0[01][0-9][.]jpg'),
            "user_id" => $this->faker->randomElement($array = array(2, 3, 4, 5, 6, 7)),
            "numeroPieceIdentite" => $this->faker->unique()->randomNumber($nbDigits = 9),
        ];
    }
}
