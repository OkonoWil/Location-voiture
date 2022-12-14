<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Okono',
                'lastName' => 'Wilfried',
                'username' => 'mrwil',
                'email' => 'mrwil@laracar.cm',
                'phone1' => 653490998,
                'salaire' => 500000,
                'sexe' => 'Homme',
                'photo' => 'profils/pp1_n.jpg',
                'email_verified_at' => now(),
                'password' => Hash::make('1234'),
                'role_id' => 1,
                'created_at' => '2017-04-09 12:09:14',
            ],
            [
                'name' => 'Fonkou',
                'lastName' => 'Saintclair',
                'username' => '5DKlair',
                'email' => '5DKlair@laracar.cm',
                'phone1' => 681640352,
                'salaire' => 300000,
                'sexe' => 'Homme',
                'photo' => 'profils/pp002.jpg',
                'email_verified_at' => now(),
                'password' => Hash::make('1234'),
                'role_id' => 3,
                'created_at' => '2017-08-11 12:09:14',
            ],
            [
                'name' => 'Douanla',
                'lastName' => 'Elsa',
                'username' => 'diana',
                'email' => 'diana@laracar.cm',
                'phone1' => 651523806,
                'salaire' => 200000,
                'sexe' => 'Femme',
                'photo' => 'profils/pp002.jpg',
                'email_verified_at' => now(),
                'password' => Hash::make('1234'),
                'role_id' => 2,
                'created_at' => '2017-08-11 12:09:14',
            ],
        ]);
    }
}
