<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
	    DB::table('categories')->insert(['name' => 'Action']);
	    DB::table('categories')->insert(['name' => 'Adventure']);
	    DB::table('categories')->insert(['name' => 'Educatief']);
	    DB::table('categories')->insert(['name' => 'Fighting']);
	    DB::table('categories')->insert(['name' => 'Flight']);
	    DB::table('categories')->insert(['name' => 'Horror']);
	    DB::table('categories')->insert(['name' => 'MMO']);
	    DB::table('categories')->insert(['name' => 'Music']);
	    DB::table('categories')->insert(['name' => 'Party']);
	    DB::table('categories')->insert(['name' => 'Platform']);
	    DB::table('categories')->insert(['name' => 'Puzzle']);
	    DB::table('categories')->insert(['name' => 'Race']);
	    DB::table('categories')->insert(['name' => 'RPG']);
	    DB::table('categories')->insert(['name' => 'Shooter']);
	    DB::table('categories')->insert(['name' => 'Simulation']);
	    DB::table('categories')->insert(['name' => 'Sport']);
	    DB::table('categories')->insert(['name' => 'Stealth']);
	    DB::table('categories')->insert(['name' => 'Strategy']);
	    DB::table('categories')->insert(['name' => 'Xbox One']);
	    DB::table('categories')->insert(['name' => 'PS4']);
	    DB::table('categories')->insert(['name' => 'Switch']);

    }
}
