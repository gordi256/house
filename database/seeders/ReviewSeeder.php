<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('ru_RU');

        for ($i = 1; $i < 51; $i++) {
            DB::table('reviews')->insert([
                'building_id' => $faker->numberBetween(1, 49),
                'user_id' => $faker->numberBetween(1, 10),
                'description' => $faker->paragraph(),
                'created_at' => $faker->dateTimeBetween('-180 days', now()),
            ]);
        }



        for ($k = 1; $k < 2500; $k++) {
            DB::table('review_items')->insert([

                'review_id' => $faker->numberBetween(1, 49),
                'item_id' => $faker->numberBetween(1, 80),
                'rating' => $faker->numberBetween(0, 10),
                'check' => 'Да',                
                'rate' => $faker->numberBetween(1000, 10000),
                'value' => $faker->randomFloat(3, 10, 30),
                'description' => $faker->paragraph(),
                'created_at' => $faker->dateTimeBetween('-180 days', now()),
            ]);
        }
    }
}
