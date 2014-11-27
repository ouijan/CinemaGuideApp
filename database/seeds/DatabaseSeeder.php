<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Movies;
use App\Cinemas;
use App\SessionTimes;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		// truncate tables
		Movies::truncate();
		Cinemas::truncate();
		SessionTimes::truncate();
		
		Model::unguard();

		// call seeders
		$this->call('MoviesTableSeeder');
		$this->call('CinemasTableSeeder');
		$this->call('SessionTimesTableSeeder');
	}

}