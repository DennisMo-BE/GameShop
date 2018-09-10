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
        DB::table('products')->insert(['photo_id' => '1','Title' => 'God of War','price' => '5','body' => 'Dit is god of war','quantity' => '4','created_at' => date_create(),'updated_at' => date_create()]);
        DB::table('products')->insert(['photo_id' => '2','Title' => 'Crash Bandicoot','price' => '6','body' => 'Dit is Crash Bandicoot','quantity' => '6','created_at' => date_create(),'updated_at' => date_create()]);
        DB::table('products')->insert(['photo_id' => '3','Title' => 'Battlefield 4','price' => '8','body' => 'Dit is Battlefield 4','quantity' => '8','created_at' => date_create(),'updated_at' => date_create()]);
        DB::table('products')->insert(['photo_id' => '4','Title' => 'Call of Duty: IW','price' => '10','body' => 'Dit is Call of Duty: IW','quantity' => '10','created_at' => date_create(),'updated_at' => date_create()]);
        DB::table('products')->insert(['photo_id' => '5','Title' => 'Rainbow six siege','price' => '12','body' => 'Dit is Rainbow six siege','quantity' => '12','created_at' => date_create(),'updated_at' => date_create()]);
        DB::table('products')->insert(['photo_id' => '6','Title' => 'Fifa 18','price' => '14','body' => 'Dit is Fifa 18','quantity' => '14','created_at' => date_create(),'updated_at' => date_create()]);
        DB::table('products')->insert(['photo_id' => '7','Title' => 'Just Cause 3','price' => '16','body' => 'Dit is Just Cause 3','quantity' => '16','created_at' => date_create(),'updated_at' => date_create()]);
        DB::table('products')->insert(['photo_id' => '8','Title' => 'Dishonered 1','price' => '18','body' => 'Dit is Dishonered 2','quantity' => '18','created_at' => date_create(),'updated_at' => date_create()]);
        DB::table('products')->insert(['photo_id' => '9','Title' => 'Uncharted 4','price' => '20','body' => 'Dit is Uncharted 4','quantity' => '20','created_at' => date_create(),'updated_at' => date_create()]);
        DB::table('products')->insert(['photo_id' => '10','Title' => 'Deadpool','price' => '22','body' => 'Dit is Deadpool','quantity' => '22','created_at' => date_create(),'updated_at' => date_create()]);
        DB::table('products')->insert(['photo_id' => '11','Title' => 'Watch Dogs 2','price' => '24','body' => 'Dit is Watch Dogs 2 ','quantity' => '24','created_at' => date_create(),'updated_at' => date_create()]);
        DB::table('products')->insert(['photo_id' => '12','Title' => 'Payday 2','price' => '26','body' => 'Dit is Payday 2','quantity' => '26','created_at' => date_create(),'updated_at' => date_create()]);


        //categorieën invullen voor producten -> tussentabel
        DB::table('category_product')->insert(['product_id' => '1','category_id' => '1', 'created_at' => date_create(),'updated_at' => date_create(),'updated_at' => date_create()]);
        DB::table('category_product')->insert(['product_id' => '1','category_id' => '20', 'created_at' => date_create(),'updated_at' => date_create(),'updated_at' => date_create()]);
        DB::table('category_product')->insert(['product_id' => '2','category_id' => '2', 'created_at' => date_create(),'updated_at' => date_create(),'updated_at' => date_create()]);
        DB::table('category_product')->insert(['product_id' => '2','category_id' => '20', 'created_at' => date_create(),'updated_at' => date_create(),'updated_at' => date_create()]);
        DB::table('category_product')->insert(['product_id' => '3','category_id' => '14', 'created_at' => date_create(),'updated_at' => date_create(),'updated_at' => date_create()]);
        DB::table('category_product')->insert(['product_id' => '3','category_id' => '20', 'created_at' => date_create(),'updated_at' => date_create(),'updated_at' => date_create()]);
        DB::table('category_product')->insert(['product_id' => '4','category_id' => '14', 'created_at' => date_create(),'updated_at' => date_create(),'updated_at' => date_create()]);
        DB::table('category_product')->insert(['product_id' => '4','category_id' => '20', 'created_at' => date_create(),'updated_at' => date_create(),'updated_at' => date_create()]);
        DB::table('category_product')->insert(['product_id' => '5','category_id' => '14', 'created_at' => date_create(),'updated_at' => date_create(),'updated_at' => date_create()]);
        DB::table('category_product')->insert(['product_id' => '5','category_id' => '20', 'created_at' => date_create(),'updated_at' => date_create(),'updated_at' => date_create()]);
        DB::table('category_product')->insert(['product_id' => '6','category_id' => '16', 'created_at' => date_create(),'updated_at' => date_create(),'updated_at' => date_create()]);
        DB::table('category_product')->insert(['product_id' => '6','category_id' => '20', 'created_at' => date_create(),'updated_at' => date_create(),'updated_at' => date_create()]);
        DB::table('category_product')->insert(['product_id' => '7','category_id' => '1', 'created_at' => date_create(),'updated_at' => date_create(),'updated_at' => date_create()]);
        DB::table('category_product')->insert(['product_id' => '7','category_id' => '20', 'created_at' => date_create(),'updated_at' => date_create(),'updated_at' => date_create()]);
        DB::table('category_product')->insert(['product_id' => '8','category_id' => '4', 'created_at' => date_create(),'updated_at' => date_create(),'updated_at' => date_create()]);
        DB::table('category_product')->insert(['product_id' => '8','category_id' => '20', 'created_at' => date_create(),'updated_at' => date_create(),'updated_at' => date_create()]);
        DB::table('category_product')->insert(['product_id' => '9','category_id' => '2', 'created_at' => date_create(),'updated_at' => date_create(),'updated_at' => date_create()]);
        DB::table('category_product')->insert(['product_id' => '9','category_id' => '20', 'created_at' => date_create(),'updated_at' => date_create(),'updated_at' => date_create()]);
        DB::table('category_product')->insert(['product_id' => '10','category_id' => '4', 'created_at' => date_create(),'updated_at' => date_create(),'updated_at' => date_create()]);
        DB::table('category_product')->insert(['product_id' => '10','category_id' => '20', 'created_at' => date_create(),'updated_at' => date_create(),'updated_at' => date_create()]);
        DB::table('category_product')->insert(['product_id' => '11','category_id' => '1', 'created_at' => date_create(),'updated_at' => date_create(),'updated_at' => date_create()]);
        DB::table('category_product')->insert(['product_id' => '11','category_id' => '20', 'created_at' => date_create(),'updated_at' => date_create(),'updated_at' => date_create()]);
        DB::table('category_product')->insert(['product_id' => '12','category_id' => '14', 'created_at' => date_create(),'updated_at' => date_create(),'updated_at' => date_create()]);
        DB::table('category_product')->insert(['product_id' => '12','category_id' => '20', 'created_at' => date_create(),'updated_at' => date_create(),'updated_at' => date_create()]);

    }
}
