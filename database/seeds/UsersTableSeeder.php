<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
	    DB::table('users')->insert(['role_id'=>1, 'is_active'=>1,  'first_name' => 'Dennis', 'last_name' => 'Mohammad', 'address' => 'Veldstraat 20', 'city' => 'Brugge','postal_code' => '8200','country_id' => '2','phone' => '0474050280','email'=>'dennis@test.be', 'password'=>bcrypt(123456), 'created_at'=>'2018-03-28 00:00:00', 'updated_at'=>'2018-03-28 00:00:00', 'photo_id'=>1]);
	    DB::table('users')->insert(['role_id'=>1, 'is_active'=>1, 'first_name' => 'Dinnes', 'last_name' => 'Mohammad', 'address' => 'Veldstraat 10', 'city' => 'Brugge','postal_code' => '8200','country_id' => '2','phone' => '0474024365','email'=>'dinnes@test.be', 'password'=>bcrypt(123456), 'created_at'=>'2018-03-28 00:00:00', 'updated_at'=>'2018-03-28 00:00:00', 'photo_id'=>2]);
    }
}
