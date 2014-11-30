<?php 

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Faker\Factory as Faker;
use App\SessionTimes;
use App\Movies;
use App\Cinemas;

class SessionTimesTableSeeder extends Seeder {

	/**
	 * Seeds movies table.
	 *
	 * @return void
	 */
	public function run()
	{
		$faker = Faker::create();


		foreach(range(1,100) as $index)
		{

			// randomise movie and cinema
			$movieIds = Movies::lists('id');
			$cinemaIds = Cinemas::lists('id');
			
			// create random session
			SessionTimes::create([
				'movie_id' 	=> $faker->randomElement($movieIds),
				'cinema_id'	=> $faker->randomElement($cinemaIds),
				'date_time' => $faker->dateTimeThisMonth(),
			]);

		}
	}

}