<?php

class MoviesTest extends TestCase {

	/** @test */
	public function it_fetches_movies()
	{
		// act
		$response = $this->call('GET', 'api/v1/movies');
		
		
		// assert
		$this->assertEquals(200, $response->getStatusCode());
		

	}

	/** @test */
	public function it_fetches_a_movie()
	{
		// act
		$response = $this->call('GET', 'api/v1/movies/1');
		
		
		// assert
		$this->assertEquals(200, $response->getStatusCode());
		
		
	}


	/** @test */
	public function it_returns_404_error_when_a_movie_isnt_found()
	{
		// act
		$response = $this->call('GET', 'api/v1/movies/asf99');
		

		$responseSessions = $this->call('GET', 'api/v1/movies/asf99/sessions');
		
		// assert
		$this->assertEquals(404, $response->getStatusCode());

		$this->assertEquals(404, $responseSessions->getStatusCode());

		
		
	}

	/** @test */
	public function it_fetches_sessions_of_a_movie()
	{
		// act
		$response = $this->call('GET', 'api/v1/movies/1/sessions');
		
		
		// assert
		$this->assertEquals(200, $response->getStatusCode());
		
		
	}

	/** @test */
	public function it_filters_sessions_by_date()
	{
		// act
		$response = $this->call('GET', 'api/v1/movies/1/sessions?date=2014');
		
		
		// assert
		$this->assertEquals(200, $response->getStatusCode());
		
		
	}

	/** @test */
	public function it_creates_a_new_movie()
	{
		// act
		$response = $this->call('POST', 'api/v1/movies', [
			'title' => 'Star Wars'
		]);
		
		// assert
		$this->assertEquals(201, $response->getStatusCode());
		
		
	}

	/** @test */
	public function it_returns_error_when_failed_movie_creation()
	{
		// act
		$response = $this->call('POST', 'api/v1/movies');
		
		// assert
		$this->assertEquals(400, $response->getStatusCode());
	}


	/** @test */
	public function it_updates_a_movie()
	{
		// act
		$response = $this->call('PUT', 'api/v1/movies/1', [
			'id' => 1,
			'title' => 'The Hobbit',
		]);
		
		
		// assert
		$this->assertEquals(200, $response->getStatusCode());
	}



	/** @test */
	public function it_returns_error_when_failed_movie_update()
	{
		// act
		$response = $this->call('PUT', 'api/v1/movies/1');
		
		// assert
		$this->assertEquals(400, $response->getStatusCode());
	}



	/** @test */
	public function it_deletes_a_movie()
	{
		// act
		$response = $this->call('DELETE', 'api/v1/movies/1');
		
		// assert
		$this->assertEquals(200, $response->getStatusCode());
	}

}
