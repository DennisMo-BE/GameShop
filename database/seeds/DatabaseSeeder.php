<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    $this->call(RolesTableSeeder::class);
	    $this->call(CategoryTableSeeder::class);
	    $this->call(PhotosTableSeeder::class);
	    $this->call(ProductsTableSeeder::class);
	    $this->call(UsersTableSeeder::class);
	    $this->call(CountriesTableSeeder::class);
    }
}
