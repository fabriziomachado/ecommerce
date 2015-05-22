<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\Hash as Hash;
use CodeCommerce\User;

class UserTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('users')->truncate();

        $faker = Faker::create('pt_BR');
        foreach (range(1, 15) as $i) {

            User::create([
                'name'     => $faker->firstName(),
                'email'    => $faker->email(),
                'password' => Hash::make($faker->word())
            ]);
        }
    }
}