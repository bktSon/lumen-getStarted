<?php

use Illuminate\Database\Seeder;

class HotelSampleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	  DB::table('hotels')->insert([
		  'name' => str_random(10),
		  'address' => str_random(10),
		  'created_at' => new DateTime()
	  ]);
    }
}
