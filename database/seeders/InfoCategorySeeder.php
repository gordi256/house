<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InfoCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('info_categories')->insert(['name' =>   'Общая информация', 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('info_categories')->insert(['name' =>   'Отопление',  'order_column' =>   2, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('info_categories')->insert(['name' =>   'ГВС', 'order_column' =>   3,  'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('info_categories')->insert(['name' =>   'ХВС', 'order_column' =>   4,  'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('info_categories')->insert(['name' =>   'Канализация',  'order_column' =>   5, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('info_categories')->insert(['name' =>   'Электроснабжение',  'order_column' =>   6, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('info_categories')->insert(['name' =>   'Кровля',  'order_column' =>   7, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('info_categories')->insert(['name' =>   'МКД',  'order_column' =>   8, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('info_categories')->insert(['name' =>   'МОП',  'order_column' =>   9, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('info_categories')->insert(['name' =>   'Благоустройство',  'order_column' =>   10, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
    }
}
