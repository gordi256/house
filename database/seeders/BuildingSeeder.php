<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class BuildingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('ru_RU');
        for ($i = 1; $i < 51; $i++) {
            DB::table('buildings')->insert([
                'name' =>  $faker->address,
                'street' =>  $faker->streetName,
                'house' =>  $faker->buildingNumber,
                'floors' =>  $faker->numberBetween(1, 49),

                'organization' => 'Наша организация',
                'description' =>  '',
                'active' => 1,
                'created_at' =>  now(),

            ]);
        }
    }
}
