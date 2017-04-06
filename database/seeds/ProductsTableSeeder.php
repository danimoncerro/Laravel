<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
        	'title'=>'iphon1',
        	'price'=> 1900,
        	'stock'=> 7,
        	'category_id'=>1,
        ]);

        DB::table('products')->insert([
        	'title'=>'samsung s8',
        	'price'=> 2500,
        	'stock'=> 19,
        	'category_id'=>1,
        ]);

        DB::table('products')->insert([
        	'title'=>'laptop Asus',
        	'price'=> 3000,
        	'stock'=> 15,
        	'category_id'=>2,
        ]);

        DB::table('products')->insert([
        	'title'=>'laptotp Toshiba',
        	'price'=> 3200,
        	'stock'=> 8,
        	'category_id'=>2,
        ]);
    }
}
