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


		foreach(range(1,30) as $index)
		{

			// randomise movie and cinema
			$movie = Movies::orderByRaw("RAND()")->get()->first();
			$cinema = Cinemas::orderByRaw("RAND()")->get()->first();
			
			// create random session
			SessionTimes::create([
				'movie_id' 	=> $movie['id'],
				'cinema_id'	=> $cinema['id'],
				'date_time' => $faker->dateTimeThisMonth(),
			]);

		}
	}

}