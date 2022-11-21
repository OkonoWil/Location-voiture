<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Client;
use App\Models\Marque;
use App\Models\Role;
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
            'phone2' => 653490998,
            'phone1' => 6534909998,
            'sexe' => 'homme',
            'email_verified_at' => now(),
            'password' => Hash::make('piratepro2.0'),
            'role_id' => 1,
            'remember_token' => Str::random(10)
        ]);

        $this->call(EtatSeeder::class);
        $this->call(Marque::class);

        Client::factory(100)->create();
        Voiture::factory(30)->create();
    }
}
