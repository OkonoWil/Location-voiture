<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Client;
use App\Models\Location;
use App\Models\Marque;
use App\Models\Role;
use App\Models\User;
use App\Models\Voiture;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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

        \App\Models\User::factory()->create([
            'name' => 'Okono',
            'lastName' => 'Wilfried',
            'username' => 'mrwil',
            'email' => 'mrwil@laracar.cm',
            'phone2' => 65914752,
            'phone1' => 653490998,
            'sexe' => 'homme',
            'email_verified_at' => now(),
            'password' => Hash::make('piratepro2.0'),
            'role_id' => 1,
        ]);

        User::factory(10)->create();

        Client::factory(100)->create();

        $this->call(EtatSeeder::class);

        $this->call(MarqueSeeder::class);

        Voiture::factory(30)->create();


        $this->call(LocationSeeder::class);

        $this->call(PaiementSeeder::class);

        $this->call(RetourSeeder::class);
    }
}
