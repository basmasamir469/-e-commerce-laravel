<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $products = [
            [
                'product_name' => ['en'=>'T-Shirt','ar'=>'تيشرت '],
                'price' => 250,
                'quantity' => 5,
                'category_id'=>7
            ],
            [
                'product_name' => ['en'=>'blouse','ar'=>'بلوزة'],
                'price' => 60,
                'quantity' => 10,
                'category_id'=>1
            ],
            [
                'product_name' => ['en'=>'short','ar'=>'شورت'],
                'price' => 50,
                'quantity' => 30,
                 'category_id'=>2
            ],
            [
                'product_name' => ['en'=>'pants','ar'=>'بنطلون'],
                'price' => 12,
                'quantity' => 20,
                'category_id'=>2
            ],
            [
                'product_name' => ['en'=>'Cartoon-Astronout-T-Shirt','ar'=>'تيشرت مشجر'],
                'price' => 250,
                'quantity' => 5,
                'category_id'=>7
            ],
            [
                'product_name' => ['en'=>'Cartoon-Astronout-T-Shirt2','ar'=>'تيشرت مشجر2'],
                'price' => 250,
                'quantity' => 5,
                'category_id'=>7
            ],
            [
                'product_name' => ['en'=>'classic-shirt','ar'=>'قميص رجالي'],
                'price' => 250,
                'quantity' => 5,
                'category_id'=>6
            ],

            [
                'product_name' => ['en'=>'classic-shirt2','ar'=>'2قميص رجالي'],
                'price' => 250,
                'quantity' => 5,
                'category_id'=>6
            ],


        ];
        $product_images=['n8.jpg','f8.jpg','n6.jpg','f7.jpg','f3.jpg','f2.jpg','n1.jpg','n2.jpg'];
        foreach($products as $key=> $product){
            $product=Product::Create($products[$key]);
            $path='public/front/images/products/'.$product_images[$key];
            $product->addMedia($path)
            ->toMediaCollection('product_images');
            $newPath=$product->getFirstMedia('product_images')->getPath();   
            File::copy($newPath,$path);   
        }
    }
}
