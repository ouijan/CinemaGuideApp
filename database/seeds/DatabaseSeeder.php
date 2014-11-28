<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Movies;
use App\Cinemas;
use App\SessionTimes;

class DatabaseSeeder extends Seeder {

	private $tables = [
		'movies',
		'cinemas',
		'session_times',
	];

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		// Truncate database
		$this->cleanDatabase();
		
		Model::unguard();

		// call seeders
		$this->call('MoviesTableSeeder');
		$this->call('CinemasTableSeeder');
		$this->call('SessionTimesTableSeeder');
	}


	/**
	 * Cleans out the database via truncate.
	 *
	 * @return void
	 */
	private function cleanDatabase()
	{
		DB::statement('SET FOREIGN_KEY_CHECKS=0');

		foreach( $this->tables as $tableName )
		{
			DB::table($tableName)->truncate();
		}

		DB::statement('SET FOREIGN_KEY_CHECKS=1');
	}

}