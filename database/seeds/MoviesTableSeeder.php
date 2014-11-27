<?php 

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Faker\Factory as Faker;
use App\Movies;

class MoviesTableSeeder extends Seeder {

	/**
	 * Seeds movies table.
	 *
	 * @return void
	 */
	public function run()
	{
		$faker = Faker::create();


		foreach(range(1,10) as $index)
		{
			Movies::create([
				'title'	=> $faker->sentence(3),
			]);
		}

	}

}