<?php 

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Faker\Factory as Faker;
use App\Cinemas;

class CinemasTableSeeder extends Seeder {

	/**
	 * Seeds cinemas table.
	 *
	 * @return void
	 */
	public function run()
	{
		$faker = Faker::create();


		foreach(range(1,10) as $index)
		{
			Cinemas::create([
				'name' 		=> $faker->sentence(2),
				'address'	=> $faker->streetAddress,
				'geo_lat' 	=> $faker->latitude,
				'geo_long' 	=> $faker->longitude,
			]);
		}

	}

}