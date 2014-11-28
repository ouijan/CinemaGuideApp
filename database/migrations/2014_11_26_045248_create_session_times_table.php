<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSessionTimesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('session_times', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('movie_id')->unsigned();
			$table->foreign('movie_id')->references('id')->on('movies')->onDelete('cascade');
			$table->integer('cinema_id')->unsigned();
			$table->foreign('cinema_id')->references('id')->on('cinemas')->onDelete('cascade');
			$table->timestamp('date_time');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('session_times');
	}

}
