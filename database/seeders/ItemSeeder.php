<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('items')->insert(['name' =>   'Наличие повреждений, окраски на входных дверях', 'category_id' =>   1, 'rate' => 1000, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('items')->insert(['name' =>   'Наличие повреждений приямков, входов в подвал', 'category_id' =>   1, 'rate' => 1000, 'order_column' =>   2, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('items')->insert(['name' =>   'Наличие повреждений конструкций, покрытия, потолков козырьков', 'category_id' =>   1, 'rate' => 1000, 'order_column' =>   3, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('items')->insert(['name' =>   'Наличие повреждений желобов и водостоков', 'category_id' =>   1, 'rate' => 1000, 'order_column' =>   4, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('items')->insert(['name' =>   'Наличие повреждений отделочного слоя входных групп (подпорные стены, столбы)', 'category_id' =>   1, 'rate' => 1000, 'order_column' =>   5, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('items')->insert(['name' =>   'Наличие повреждений крылец (площадки, ступени, ограждения) ', 'category_id' =>   1, 'rate' => 1000, 'order_column' =>   6, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('items')->insert(['name' =>   'Наличие повреждений аншлагов, номерных знаков', 'category_id' =>   1, 'rate' => 1000, 'order_column' =>   7, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);

        DB::table('items')->insert(['name' =>   'Наличие разрушений, провалов, трещин, поросли', 'category_id' =>   2, 'rate' => 1000, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);

        DB::table('items')->insert(['name' =>   'Наличие повреждений отделочного слоя стен цоколя', 'category_id' =>   3, 'rate' => 1000, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('items')->insert(['name' =>   'Наличие выбоин, разрущений, повреждений межпанельных швов', 'category_id' =>   3, 'rate' => 1000, 'order_column' =>   2, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('items')->insert(['name' =>   'Нарушение целостности окон, отливов', 'category_id' =>   3, 'rate' => 1000, 'order_column' =>   3, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('items')->insert(['name' =>   'Наличие повреждений отделочного слоя фасада (шпаклевка, штукатурка, окраска)', 'category_id' =>   3, 'rate' => 1000, 'order_column' =>   4, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('items')->insert(['name' =>   'Наличие трещин, разрушений  в кирпичной кладке, панелях', 'category_id' =>   3, 'rate' => 1000, 'order_column' =>   5, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('items')->insert(['name' =>   'Вентиляционные продухи закрыты (зарешетчены)?', 'category_id' =>   3, 'rate' => 1000, 'order_column' =>   6, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);


        // 4 группа
        DB::table('items')->insert(['name' =>   'Наличие трещин, разрушений балконных плит (плит лоджий)', 'category_id' =>   4, 'rate' => 1000, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        // 5 группа

        DB::table('items')->insert(['name' =>   'Наличие  разрушений  кровельного покрытия', 'category_id' =>   5, 'rate' => 1000, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('items')->insert(['name' =>   'Наличие разгерметизации листов кровли', 'category_id' =>   5, 'rate' => 1000, 'order_column' =>   2, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('items')->insert(['name' =>   'Наличие повреждений обделок кровли из жести (парапеты, конек и т.д.)', 'category_id' =>   5, 'rate' => 1000, 'order_column' =>   3, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('items')->insert(['name' =>   'Нарушение целостности парапетов', 'category_id' =>   5, 'rate' => 1000, 'order_column' =>   4, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('items')->insert(['name' =>   'Наличие повреждений ограждений кровли', 'category_id' =>   5, 'rate' => 1000, 'order_column' =>   5, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('items')->insert(['name' =>   'Наличие повреждений ограждений кровли', 'category_id' =>   5, 'rate' => 1000, 'order_column' =>   6, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        // DB::table('items')->insert(['name' =>   'Наличие', 'category_id' =>   5, 'rate' => 1000 , 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);

        // 6 группа

        DB::table('items')->insert(['name' =>   'Наличие повреждений стен машинных помещений', 'category_id' =>   6, 'rate' => 1000, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('items')->insert(['name' =>   'Наличие повреждений покрытий машинных помещений', 'category_id' =>   6, 'rate' => 1000, 'order_column' =>   2, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('items')->insert(['name' =>   'Нарушение целостности окон, отливов машинных помещений', 'category_id' =>   6, 'rate' => 1000, 'order_column' =>   3, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        // 7 группа

        DB::table('items')->insert(['name' =>   'Наличие повреждений деревянных элементов', 'category_id' =>   7, 'rate' => 1000, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('items')->insert(['name' => 'Наличие повреждений слуховых окон', 'category_id' =>   7, 'rate' => 1000, 'order_column' =>   2, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('items')->insert(['name' => 'Вентиляционные продухи закрыты (зарешетчены)?', 'category_id' =>   7, 'rate' => 1000, 'order_column' =>   3, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('items')->insert(['name' => 'Наличие повреждений водосточных воронок', 'category_id' =>   7, 'rate' => 1000, 'order_column' =>   4, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('items')->insert(['name' =>   'Наличие повреждений, разгерметизации труб ливневой канализации', 'category_id' =>   7, 'rate' => 1000, 'order_column' =>   5, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('items')->insert(['name' => 'Наличие повреждений, засоров желобов', 'category_id' =>   7, 'rate' => 1000, 'order_column' =>   6, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('items')->insert(['name' => 'Наличие повреждений водосточных труб', 'category_id' =>   7, 'rate' => 1000, 'order_column' =>   7, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('items')->insert(['name' => 'Наличие повреждений фановых труб', 'category_id' =>   7, 'rate' => 1000, 'order_column' =>   8, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);


        // 8 группа
        DB::table('items')->insert(['name' =>   'Наличие повреждений кладки оголовков', 'category_id' =>   8, 'rate' => 1000, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('items')->insert(['name' =>  'Наличие повреждений зонтов над вентиляционными каналами', 'category_id' =>   8, 'rate' => 1000, 'order_column' =>   2, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);

        // 9 группа
        DB::table('items')->insert(['name' =>   'Наличие повреждений кладки оголовков', 'category_id' =>   9, 'rate' => 1000, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('items')->insert(['name' =>   'Наличие повреждений зонтов над вентиляционными каналами', 'category_id' =>   9, 'rate' => 1000, 'order_column' =>   2, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);

        // 10 группа
        DB::table('items')->insert(['name' =>   'Наличие трещин, разрушений  лестничных маршей', 'category_id' =>   10, 'rate' => 1000, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('items')->insert(['name' =>   'Наличие трещин, разрушений  в кирпичной кладке, панелях', 'category_id' =>   10, 'rate' => 1000, 'order_column' =>   2, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('items')->insert(['name' =>   'Наличие выбоин, разрущений, повреждений в полах площадок, корридоров, лестничных маршей (в том числе покрытий и плинтусов)', 'category_id' =>   10, 'rate' => 1000, 'order_column' =>   3, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('items')->insert(['name' =>   'Наличие повреждений отделочного слоя стен', 'category_id' =>   10, 'rate' => 1000, 'order_column' =>   4, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('items')->insert(['name' =>   'Наличие повреждений отделочного слоя потолков', 'category_id' =>   10, 'rate' => 1000, 'order_column' =>   5, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('items')->insert(['name' =>   'Наличие повреждений почтовых ящиков', 'category_id' =>   10, 'rate' => 1000, 'order_column' =>   6, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);



        // 11 группа
        DB::table('items')->insert(['name' =>   'Наличие повреждений обрамлений и порогов входов в кабины', 'category_id' =>   11, 'rate' => 1000, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);

        // 12 группа

        DB::table('items')->insert(['name' =>   'Наличие  повреждений, разрушений стенок мусопровода, клапана мусоропровода', 'category_id' =>   12, 'rate' => 1000, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('items')->insert(['name' =>   'Наличие  окраски мусопровода', 'category_id' =>   12, 'rate' => 1000, 'order_column' =>   2, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);



        // 13 группа


        DB::table('items')->insert(['name' =>   'Наличие повреждений лестничных решеток', 'category_id' =>   13, 'rate' => 1000, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('items')->insert(['name' =>   'Наличие повреждений поручней', 'category_id' =>    13, 'rate' => 1000, 'order_column' =>   2, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('items')->insert(['name' =>   'Наличие повреждений дверей в МОП', 'category_id' =>    13, 'rate' => 1000, 'order_column' =>   3, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('items')->insert(['name' =>   'Наличие запирающих устройств дверей входов в подвал', 'category_id' =>    13, 'rate' => 1000, 'order_column' =>   4, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('items')->insert(['name' =>   'Наличие повреждений оконных решеток', 'category_id' =>    13, 'rate' => 1000, 'order_column' =>   5, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('items')->insert(['name' =>   'Наличие запирающих устройств дверей входов в чердак', 'category_id' =>    13, 'rate' => 1000, 'order_column' =>   6, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);


        // 14 группа
        DB::table('items')->insert(['name' =>   'Наличие  повреждений, коррозии, трещин, следов подтеканий, течей в трубопроводах', 'category_id' =>   14, 'rate' => 1000, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('items')->insert(['name' =>   'Имеются ли радиаторы в МОП?', 'category_id' =>    14, 'rate' => 1000, 'order_column' =>   2, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);


        // 15 группа
        DB::table('items')->insert(['name' =>   'Наличие  повреждений, коррозии, трещин, следов подтеканий, течей в трубопроводах', 'category_id' =>   15, 'rate' => 1000, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);


        // 16 группа   
        DB::table('items')->insert(['name' =>   'Наличие  повреждений, коррозии, трещин, следов подтеканий, течей в трубопроводах', 'category_id' =>   16, 'rate' => 1000, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        // 17 группа
        DB::table('items')->insert(['name' =>   'Наличие  повреждений, коррозии, трещин, следов подтеканий, течей в трубопроводах', 'category_id' =>   17, 'rate' => 1000, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('items')->insert(['name' =>   'Наличие крышек ревизий', 'category_id' =>   17, 'rate' => 1000, 'order_column' =>   2, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);

        // 18 группа
        DB::table('items')->insert(['name' =>   'Наличие  повреждений, скруток на сетях электроснабжения в МОП', 'category_id' =>   18, 'rate' => 1000, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('items')->insert(['name' =>   'Наличие  повреждений светильников, плафонов', 'category_id' =>   18, 'rate' => 1000, 'order_column' =>   2, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('items')->insert(['name' =>   'Наличие повреждений этажных щитов', 'category_id' =>   18, 'rate' => 1000, 'order_column' =>   3, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('items')->insert(['name' =>   'Наличие запорных устройств на ВРУ', 'category_id' =>   18, 'rate' => 1000, 'order_column' =>   4, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);

        // 19 группа
        DB::table('items')->insert(['name' =>   'Наличие  повреждений, коррозии, трещин, следов подтеканий, течей в трубопроводах', 'category_id' =>   19, 'rate' => 1000, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('items')->insert(['name' =>   'Следы коррозии, подтеканий на задвижках?', 'category_id' =>   19, 'rate' => 1000, 'order_column' =>   2, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('items')->insert(['name' =>   'Нарушение изоляции трубопровода', 'category_id' =>   19, 'rate' => 1000, 'order_column' =>   3, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);

        // 20 группа
        DB::table('items')->insert(['name' =>   'Наличие  повреждений, коррозии, трещин, следов подтеканий, течей в трубопроводах', 'category_id' =>   20, 'rate' => 1000, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('items')->insert(['name' =>   'Следы коррозии, подтеканий на задвижках?', 'category_id' =>   20, 'rate' => 1000, 'order_column' =>   2, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('items')->insert(['name' =>   'Нарушение изоляции трубопровода', 'category_id' =>   20, 'rate' => 1000, 'order_column' =>   3, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);

        // 21 группа
        DB::table('items')->insert(['name' =>   'Наличие  повреждений, коррозии, трещин, следов подтеканий, течей в трубопроводах', 'category_id' =>   21, 'rate' => 1000, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('items')->insert(['name' =>   'Следы коррозии, подтеканий на задвижках?', 'category_id' =>   21, 'rate' => 1000, 'order_column' =>   2, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);

        // 22 группа 
        DB::table('items')->insert(['name' =>   'Наличие  повреждений, коррозии, трещин, следов подтеканий, течей в трубопроводах', 'category_id' =>   22, 'rate' => 1000, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('items')->insert(['name' =>   'Наличие крышек ревизий', 'category_id' =>   22, 'rate' => 1000, 'order_column' =>   2, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);

        // 23 группа
        DB::table('items')->insert(['name' =>   'Необходимость замены трубопроводов на основании износа', 'category_id' =>   23, 'rate' => 1000, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);

        // 24 группа
        DB::table('items')->insert(['name' =>   'Необходимость замены трубопроводов на основании износа', 'category_id' =>   24, 'rate' => 1000, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);

        // 25 группа
        DB::table('items')->insert(['name' =>   'Необходимость замены трубопроводов на основании износа', 'category_id' =>   25, 'rate' => 1000, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);

        // 26 группа
        DB::table('items')->insert(['name' =>   'Необходимость замены трубопроводов на основании износа', 'category_id' =>   26, 'rate' => 1000, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);

        // 27 группа
        DB::table('items')->insert(['name' =>   'Наличие повреждений или нарушение окрасочного слоя лавочек', 'category_id' =>   27, 'rate' => 1000, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('items')->insert(['name' =>   'Наличие повреждений или нарушение окрасочного слоя урн', 'category_id' =>   27, 'rate' => 1000, 'order_column' =>   2, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('items')->insert(['name' =>   'Наличие повреждений или нарушение окрасочного слоя ограждений, столбов, заборов', 'category_id' =>   27, 'rate' => 1000, 'order_column' =>   3, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);

        // 28 группа
        DB::table('items')->insert(['name' =>   'Наличие сухих или аварийных деревьев', 'category_id' =>   28, 'rate' => 1000, 'order_column' =>   1, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
        DB::table('items')->insert(['name' =>   'Наличие повреждения покрытия дорожек и тротуаров', 'category_id' =>   28, 'rate' => 1000, 'order_column' =>   2, 'description' =>   '', 'active' => 1, 'created_at' =>  now(),]);
    }
}
