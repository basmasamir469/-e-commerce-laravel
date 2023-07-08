<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $arr_ar=array('بلوزات','بناطيل','فساتين','اكسسوارات','بيجامات','قمصان رجالي','تيشرتات');
        $arr_en=array('blouses','pants','dresses','accessories','pyjamas','shirts for men','t-shirts');
        foreach($arr_ar as $key => $value){
            Category::create([
                'category_name'=>['en'=>$arr_en[$key],'ar'=>$arr_ar[$key]]
            ]);
        }
    }
}
