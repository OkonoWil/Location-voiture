<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Client;
use App\Models\Location;
use App\Models\Paiement;
use App\Models\Retour;
use App\Models\User;
use App\Models\Voiture;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $this->call(RoleSeeder::class);

        // \App\Models\User::factory()->create([
        //     [
        //         'name' => 'Okono',
        //         'lastName' => 'Wilfried',
        //         'username' => 'mrwil',
        //     ],
        // ]);
        $this->call(UserSeeder::class);

        User::factory(17)->create();

        Client::factory(300)->create();

        $this->call(EtatSeeder::class);

        $this->call(MarqueSeeder::class);

        Voiture::factory(30)->create();


        $this->call(LocationSeeder::class);

        $this->call(PaiementSeeder::class);

        $this->call(RetourSeeder::class);

        Location::factory(500)->create();
        Paiement::factory(500)->create();
        Retour::factory(500)->create();
    }
}
