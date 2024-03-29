<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;



class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker::create('id_ID');

        for ($i=0; $i <=10 ; $i++) { 
            DB::table('userTable')->insert([
                "name" => $faker->name,
                "email" => $faker->email,
                "password" => bcrypt("hafiz123"),
                "username" => $faker->username,
                "idDivisi" => 1,
                "role" => 0
            ]);

        }
    }
}
