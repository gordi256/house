<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $faker = Faker::create('ru_RU');
        DB::table('categories')->insert(['name' =>   'Входные группы', 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('categories')->insert(['name' =>   'Отмостка',  'order_column' =>   2, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('categories')->insert(['name' =>   'Стены наружные', 'order_column' =>   3,  'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('categories')->insert(['name' =>   'Балконы, лоджии', 'order_column' =>   4,  'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('categories')->insert(['name' =>   'Кровля - Покрытие',  'order_column' =>   5, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('categories')->insert(['name' =>   'Машинные помещения (наружные конструкции)',  'order_column' =>   6, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('categories')->insert(['name' =>   'Конструкции кровли',  'order_column' =>   7, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('categories')->insert(['name' =>   'Система вентиляции',  'order_column' =>   8, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('categories')->insert(['name' =>   'Дымоходы',  'order_column' =>   9, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('categories')->insert(['name' =>   'МОП-Стены, потолки, полы',  'order_column' =>   10, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('categories')->insert(['name' =>   'Лифты',  'order_column' =>   11, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('categories')->insert(['name' =>   'Мусоропровод',  'order_column' =>   12, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('categories')->insert(['name' =>   'Ограждения в МОП',  'order_column' =>   13, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('categories')->insert(['name' =>   'Центральное отопление в МОП',  'order_column' =>   14, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('categories')->insert(['name' =>   'Горячее водоснабжение в МОП',  'order_column' =>   15, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('categories')->insert(['name' =>   'Холодное водоснабжение в МОП',  'order_column' =>   16, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('categories')->insert(['name' =>   'Система канализации в МОП',  'order_column' =>   17, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('categories')->insert(['name' =>   'Электрооборудование в МОП',  'order_column' =>   18, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('categories')->insert(['name' =>   'Центральное отопление (подвал, чердак, тех.этажи)',  'order_column' =>   19, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('categories')->insert(['name' =>   'Горячее водоснабжение (подвал, чердак, тех.этажи)',  'order_column' =>   20, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('categories')->insert(['name' =>   'Холодное водоснабжение (подвал, чердак, тех.этажи)',  'order_column' =>   21, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('categories')->insert(['name' =>   'Система канализации (подвал, чердак, тех.этажи)',  'order_column' =>   22, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('categories')->insert(['name' =>   'Центральное отопление (жилые и нежилые помещения)',  'order_column' =>   23, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('categories')->insert(['name' =>   'Горячее водоснабжение (жилые и нежилые помещения)',  'order_column' =>   24, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('categories')->insert(['name' =>   'Холодное водоснабжение  (жилые и нежилые помещения)',  'order_column' =>   25, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('categories')->insert(['name' =>   'Система канализации  (жилые и нежилые помещения)',  'order_column' =>   26, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('categories')->insert(['name' =>   'Элементы благоустройства',  'order_column' =>   27, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('categories')->insert(['name' =>   'Придомовая территория',  'order_column' =>   28, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
    }
}
