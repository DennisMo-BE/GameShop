<?php

use Illuminate\Database\Seeder;

class PhotosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //PS4 Items
        DB::table('photos')->insert(['file' => 'godofwar.jpg','created_at' => date_create()]);
        DB::table('photos')->insert(['file' => 'crashbandicoot.jpg','created_at' => date_create()]);
        DB::table('photos')->insert(['file' => 'battlefield4.jpg','created_at' => date_create()]);
        DB::table('photos')->insert(['file' => 'codiw.jpg','created_at' => date_create()]);
        DB::table('photos')->insert(['file' => 'rainbowsixsiege.jpg','created_at' => date_create()]);
        DB::table('photos')->insert(['file' => 'fifa.jpg','created_at' => date_create()]);
        DB::table('photos')->insert(['file' => 'justcause3.jpg','created_at' => date_create()]);
        DB::table('photos')->insert(['file' => 'dishonered2.jpg','created_at' => date_create()]);
        DB::table('photos')->insert(['file' => 'uncharted.jpg','created_at' => date_create()]);
        DB::table('photos')->insert(['file' => 'deadpool.jpg','created_at' => date_create()]);
        DB::table('photos')->insert(['file' => 'watchdogs.jpg','created_at' => date_create()]);
        DB::table('photos')->insert(['file' => 'payday.jpg','created_at' => date_create()]);

    }
}
