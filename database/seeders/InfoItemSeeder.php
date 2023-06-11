<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InfoItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {



        DB::table('info_items')->insert(['name' =>   'Год постройки', 'info_category_id' =>   1, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('info_items')->insert(['name' =>   'Высота здания', 'info_category_id' =>   1, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('info_items')->insert(['name' =>   'Длина периметра здания', 'info_category_id' =>   1, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('info_items')->insert(['name' =>   'Этажность', 'info_category_id' =>   1, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('info_items')->insert(['name' =>   'Количество подъездов', 'info_category_id' =>   1, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('info_items')->insert(['name' =>   'Количество квартир', 'info_category_id' =>   1, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('info_items')->insert(['name' =>   'Площадь подвала', 'info_category_id' =>   1, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('info_items')->insert(['name' =>   'Площать техэтажа', 'info_category_id' =>   1, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('info_items')->insert(['name' =>   'Площадь чердака', 'info_category_id' =>   1, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('info_items')->insert(['name' =>   'Количество лифтов', 'info_category_id' =>   1, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('info_items')->insert(['name' =>   'Материал фундамента', 'info_category_id' =>   1, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('info_items')->insert(['name' =>   'Материал стен', 'info_category_id' =>   1, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('info_items')->insert(['name' =>   'Наличие мусоропровода', 'info_category_id' =>   1, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);

        DB::table('info_items')->insert(['name' =>   'Вид', 'info_category_id' =>   2, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('info_items')->insert(['name' =>   'Количество стояков', 'info_category_id' =>   2, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('info_items')->insert(['name' =>   'Длина стояков', 'info_category_id' =>   2, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('info_items')->insert(['name' =>   'Длина труб в подвале', 'info_category_id' =>   2, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('info_items')->insert(['name' =>   'Длина труб на чердаке', 'info_category_id' =>   2, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('info_items')->insert(['name' =>   'Количество задвижек', 'info_category_id' =>   2, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('info_items')->insert(['name' =>   'Материал стояков', 'info_category_id' =>   2, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('info_items')->insert(['name' =>   'Материал труб в подвале', 'info_category_id' =>   2, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('info_items')->insert(['name' =>   'Материал труб на чердаке', 'info_category_id' =>   2, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('info_items')->insert(['name' =>   'Материал изоляции', 'info_category_id' =>   2, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('info_items')->insert(['name' =>   'Наличие теплосчетчика', 'info_category_id' =>   2, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);

        DB::table('info_items')->insert(['name' =>   'Вид', 'info_category_id' =>   3, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('info_items')->insert(['name' =>   'Количество стояков', 'info_category_id' =>   3, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('info_items')->insert(['name' =>   'Длина стояков', 'info_category_id' =>   3, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('info_items')->insert(['name' =>   'Длина труб в подвале', 'info_category_id' =>   3, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('info_items')->insert(['name' =>   'Длина труб на чердаке', 'info_category_id' =>   3, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('info_items')->insert(['name' =>   'Количество задвижек', 'info_category_id' =>   3, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('info_items')->insert(['name' =>   'Материал стояков', 'info_category_id' =>   3, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('info_items')->insert(['name' =>   'Материал труб в подвале', 'info_category_id' =>   3, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('info_items')->insert(['name' =>   'Материал труб на чердаке', 'info_category_id' =>   3, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('info_items')->insert(['name' =>   'Материал изоляции', 'info_category_id' =>   3, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('info_items')->insert(['name' =>   'Наличие теплосчетчика', 'info_category_id' =>   3, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);


        DB::table('info_items')->insert(['name' =>   'Вид', 'info_category_id' =>   4, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('info_items')->insert(['name' =>   'Количество стояков', 'info_category_id' =>   4, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('info_items')->insert(['name' =>   'Длина стояков', 'info_category_id' =>   4, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('info_items')->insert(['name' =>   'Длина труб в подвале', 'info_category_id' =>   4, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('info_items')->insert(['name' =>   'Длина труб на чердаке', 'info_category_id' =>   4, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('info_items')->insert(['name' =>   'Количество задвижек', 'info_category_id' =>   4, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('info_items')->insert(['name' =>   'Материал стояков', 'info_category_id' =>   4, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('info_items')->insert(['name' =>   'Материал труб в подвале', 'info_category_id' =>   4, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('info_items')->insert(['name' =>   'Материал труб на чердаке', 'info_category_id' =>   4, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('info_items')->insert(['name' =>   'Наличие теплосчетчика', 'info_category_id' =>   4, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);


        DB::table('info_items')->insert(['name' =>   'Вид', 'info_category_id' =>  5, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('info_items')->insert(['name' =>   'Количество стояков', 'info_category_id' =>   5, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('info_items')->insert(['name' =>   'Длина стояков', 'info_category_id' =>   5, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('info_items')->insert(['name' =>   'Длина труб в подвале', 'info_category_id' =>   5, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('info_items')->insert(['name' =>   'Количество выпусков', 'info_category_id' =>   5, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('info_items')->insert(['name' =>   'Материал стояков', 'info_category_id' =>   5, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('info_items')->insert(['name' =>   'Материал труб в подвале', 'info_category_id' =>   5, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);




        DB::table('info_items')->insert(['name' =>   'Количество ВРУ', 'info_category_id' => 6, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('info_items')->insert(['name' =>   'Количество этажных щитов', 'info_category_id' =>   6, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('info_items')->insert(['name' =>   'Материал сетей в ВРУ', 'info_category_id' =>   6, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('info_items')->insert(['name' =>   'Длина сетей в ВРУ', 'info_category_id' =>   6, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('info_items')->insert(['name' =>   'Материал сетей магистралей стояков', 'info_category_id' =>  6, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('info_items')->insert(['name' =>   'Длина сетей магистралей стояков', 'info_category_id' =>   6, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('info_items')->insert(['name' =>   'Количество автоматов в ВРУ', 'info_category_id' =>   6, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('info_items')->insert(['name' =>   'Количество автоматов в Щитках', 'info_category_id' =>   6, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('info_items')->insert(['name' =>   'Количество выключателей', 'info_category_id' =>   6, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('info_items')->insert(['name' =>   'Количество светильников в МОП', 'info_category_id' =>   6, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('info_items')->insert(['name' =>   'Количество точек освещения в подвале', 'info_category_id' =>  6, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('info_items')->insert(['name' =>   'Количество точек освещения на чердаке', 'info_category_id' =>   6, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('info_items')->insert(['name' =>   'Длина сетей освещения в МОП', 'info_category_id' =>   6, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('info_items')->insert(['name' =>   'Материал сетей освещения в МОП', 'info_category_id' =>  6, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);

        DB::table('info_items')->insert(['name' =>   'Вид', 'info_category_id' =>  7, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('info_items')->insert(['name' =>   'Материал', 'info_category_id' =>  7, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('info_items')->insert(['name' =>   'Площадь', 'info_category_id' =>  7, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('info_items')->insert(['name' =>   'Количество оголовков', 'info_category_id' =>  7, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('info_items')->insert(['name' =>   'Ширина парапетов', 'info_category_id' =>  7, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('info_items')->insert(['name' =>   'Площадь козырьков с кровельным покрытием', 'info_category_id' =>  7, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('info_items')->insert(['name' =>   'Вид водостоков', 'info_category_id' =>  7, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('info_items')->insert(['name' =>   'Количество водостоков', 'info_category_id' =>  7, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('info_items')->insert(['name' =>   'Длина водостоков', 'info_category_id' =>  7, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('info_items')->insert(['name' =>   'Длина желобов', 'info_category_id' =>  7, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('info_items')->insert(['name' =>   'Количество воронок', 'info_category_id' =>  7, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('info_items')->insert(['name' =>   'Материал  водостоков', 'info_category_id' =>  7, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);


        DB::table('info_items')->insert(['name' =>   'Количество окон', 'info_category_id' =>  8, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('info_items')->insert(['name' =>   'Материал окон', 'info_category_id' =>  8, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('info_items')->insert(['name' =>   'Количество входных дверей', 'info_category_id' =>  8, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('info_items')->insert(['name' =>   'Материал входных дверей', 'info_category_id' =>  8, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('info_items')->insert(['name' =>   'Количество дверей в МОП', 'info_category_id' =>  8, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('info_items')->insert(['name' =>   'Материал дверей в МОП', 'info_category_id' =>  8, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('info_items')->insert(['name' =>   'Площать козырьков над входами', 'info_category_id' =>  8, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('info_items')->insert(['name' =>   'Материал козырьков над входами', 'info_category_id' =>  8, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('info_items')->insert(['name' =>   'Площадь фасада', 'info_category_id' =>  8, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('info_items')->insert(['name' =>   'Материал отделки фасада', 'info_category_id' =>  8, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('info_items')->insert(['name' =>   'Площадь цоколя', 'info_category_id' =>  8, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('info_items')->insert(['name' =>   'Высота цоколя', 'info_category_id' =>  8, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('info_items')->insert(['name' =>   'Материал отделки цоколя', 'info_category_id' =>  8, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('info_items')->insert(['name' =>   'Площадь отмостки', 'info_category_id' =>  8, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('info_items')->insert(['name' =>   'Ширина отмостки', 'info_category_id' =>  8, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('info_items')->insert(['name' =>   'Длина межпанельных швов', 'info_category_id' =>  8, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('info_items')->insert(['name' =>   'Высота подвала', 'info_category_id' =>  8, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('info_items')->insert(['name' =>   'Высота чердака/техэтажа', 'info_category_id' =>  8, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('info_items')->insert(['name' =>   'Вид пола в подвале', 'info_category_id' =>  8, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);



        DB::table('info_items')->insert(['name' =>   'Площадь маслянной окраски стен', 'info_category_id' =>  9, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('info_items')->insert(['name' =>   'Площадь в/э окраски стен', 'info_category_id' =>  9, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('info_items')->insert(['name' =>   'Площадь другой окраски стен', 'info_category_id' =>  9, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('info_items')->insert(['name' =>   'Площадь другой окраски стен', 'info_category_id' =>  9, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('info_items')->insert(['name' =>   'Вид напольного покрытия', 'info_category_id' =>  9, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('info_items')->insert(['name' =>   'Площадь пола в моп (кроме лестниц)', 'info_category_id' =>  9, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('info_items')->insert(['name' =>   'Длина маршей', 'info_category_id' =>  9, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('info_items')->insert(['name' =>   'Ширина маршей', 'info_category_id' =>  9, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('info_items')->insert(['name' =>   'Площадь потолков (кроме лестниц)', 'info_category_id' =>  9, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('info_items')->insert(['name' =>   'Количество почтовых ящиков секционных)', 'info_category_id' =>  9, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);

        DB::table('info_items')->insert(['name' =>   'Количество лавочек', 'info_category_id' =>  10, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('info_items')->insert(['name' =>   'Количество урн', 'info_category_id' =>  10, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('info_items')->insert(['name' =>   'Детские и спортирные площадки', 'info_category_id' =>  10, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('info_items')->insert(['name' =>   'Количество оборудования на площадках', 'info_category_id' =>  10, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('info_items')->insert(['name' =>   'Длина заборов', 'info_category_id' =>  10, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('info_items')->insert(['name' =>   'Ширина заборов', 'info_category_id' =>  10, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('info_items')->insert(['name' =>   'Количество деревьев', 'info_category_id' =>  10, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
    }
}
